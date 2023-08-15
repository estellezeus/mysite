<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Payment;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Collection;


class PaymentRepository extends ResourceRepository {


    public function __construct(Payment $payment) {
        $this->model = $payment;
    }

    public function getById($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

}

