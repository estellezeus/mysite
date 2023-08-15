<?php

namespace App\Http\Controllers;

use App\Repositories\Book\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $bookRepository;
    protected $categoryRepository;
    protected $paymentRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository,
                                PaymentRepository $paymentRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
        $this->paymentRepository = $paymentRepository;
    }

    public function welcome(){
        $last3Books = $this->bookRepository->getLast3Published();

        $segments = \Request::segments();

        return view('welcome', compact('last3Books', 'segments'));
    }

    public function bookDetails($id){
        try {
            $book = $this->bookRepository->getById($id);
            $categories = $this->categoryRepository->getAll();
            $books = $this->bookRepository->getByCategory($book->category_id);
            $segments = \Request::segments()[0];

            return view('frontend.books.show', compact('book', 'categories', 'books', 'segments'));

        }catch (\Exception $e){
            dd($e);
        }
    }

    public function booksList(){
        try {
            $books = $this->bookRepository->getPublished();
            $categories = $this->categoryRepository->getAll();
            $segments = \Request::segments()[0];


            return view('frontend.books.index', compact('books', 'categories', 'segments'));
        }catch (\Exception $e){
            //dd($e);
        }
    }

    public function donate(Request $request){

        try {
            $inputs = $request->all();
            $inputs['reference'] = md5(rand());

            //dd('in', $inputs);

            $curl = curl_init();
            $transaction_reason = isset($inputs['donation_reason']) ? $inputs['donation_reason'] : '';
            $customer_email = isset($inputs['donator_mail']) ? $inputs['donator_mail'] : '';
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://my-coolpay.com/api/3dd960d8-e570-4d62-a64c-e05f892c7bc0/payin',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "transaction_amount": '.$inputs['donation_amount'].',
                "transaction_currency": "XAF",
                "transaction_reason": "'.$transaction_reason.'",
                "app_transaction_ref": "'.$inputs['reference'].'",
                "customer_phone_number": "'.$inputs['donator_phone'].'",
                "customer_name": "'.$inputs['donator_name'].'",
                "customer_email": "'.$customer_email.'",
                "customer_lang": "fr"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json'
                ),
            ));

            $responseCoolPay = curl_exec($curl);
            curl_close($curl);
            $responseCoolPay = json_decode($responseCoolPay);

            if($responseCoolPay->status == "success"){
                $payment_stored = $this->paymentRepository->store($inputs);
                //dd($responseCoolPay, $responseCoolPay->status);
                //$this->checkTransactionStatus($responseCoolPay->transaction_ref, $payment_stored->id);

                return response()->json(["status"=>$responseCoolPay->status, "ussd"=>$responseCoolPay->ussd,
                    "message"=>"Transaction initiée. Si vous ne recevez pas de notification sur votre téléphone,
                    veuillez composer le ".$responseCoolPay->ussd, "transaction_ref"=>$responseCoolPay->transaction_ref,
                    "stored_payment_id"=>$payment_stored->id]);

            }else{
dd($responseCoolPay);
                return response()->json(["status"=>"Failed", "message" => "Une erreur s'est produite"]);
            }


        }catch (\Exception $exception){
            dd($exception);
        }

    }

    public function checkTransactionStatus(Request $request){
        $inputs = $request->all();
        $ref = $inputs["reference"];

        try {
            $status = true;
            while ($status){
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://my-coolpay.com/api/3dd960d8-e570-4d62-a64c-e05f892c7bc0/checkStatus/'.$ref, //Public key
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));

                $responseStatus = curl_exec($curl);

                curl_close($curl);
                $responseStatus = json_decode($responseStatus);

                if($responseStatus->status == "success"){

                    $data = [
                        "transaction_status" => $responseStatus->transaction_status,
                        "transaction_fees" => $responseStatus->transaction_fees,
                        "transaction_currency" => $responseStatus->transaction_currency,
                        "transaction_operator" => $responseStatus->transaction_operator,
                        "transaction_type" => $responseStatus->transaction_type,
                        "cool-pay-reference" => $responseStatus->transaction_ref,
                    ];

                    if($responseStatus->transaction_status == "SUCCESS"){
                        $this->paymentRepository->update($inputs["payment_id"], $data);
                        $status = false;
                        return response()->json(["status"=>"success",
                            "message"=>"Transaction effectuée avec succès. Merci pour votre don !"]);
                    }elseif($responseStatus->transaction_status == "PENDING"){
                        $this->paymentRepository->update($inputs["payment_id"], $data);
                    }else{
                        $status = false;
                        $this->paymentRepository->destroy($inputs["payment_id"]);
                    }



                }else{

                    $this->paymentRepository->update($inputs["payment_id"],
                        ["transaction_status" => $responseStatus->status]);
                    $status = false;
                    return response()->json(["status"=>"failed",
                        "message"=>"Echec de l'opération de paiement, veuillez actualiser la page et
                        essayer à nouveau ! Merci !"]);
                }

            }

        }catch (\Exception $e){
            dd($e);
        }

    }
}
