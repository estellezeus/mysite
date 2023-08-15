
(function ($) {
    "use strict";

    function chekcNumberFormatCameroon(num) {
        console.log(num);
        return true;

    }

    function checkTransactionStatus(reference, payment_id) {
        let url = $("#checkStatus").data("url");
        console.log("in check status");

        $('#spinner').addClass('show');
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: {
                'reference': reference,
                'payment_id': payment_id
            },
            datatype: 'JSON',
            cache: false,

            success: function (data) {
                if(data.status === "success"){
                    $('#spinner').removeClass('show');
                    toastr.success(data.message);
                    $('#staticBackdrop').modal('hide');
                }else{
                    $('#spinner').removeClass('show');
                    toastr.error(data.message);
                    $('#staticBackdrop').modal('hide');
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                $('#spinner').removeClass('show');
                $('#staticBackdrop').modal('hide');
                console.log(xhr);
                console.log(errorThrown);
            }
        });

    }


    $("#donate").on("click", function (e) {
        e.preventDefault();
        let phoneNumber = $('#donator-phone').val(),   url = $("#donate-form").attr("action");
        let correct = chekcNumberFormatCameroon(phoneNumber);
        if(correct){
            var form = $("#donate-form");
            var data = new FormData(form[0]);

            $('#init-button').attr("disabled", "disabled");
            $('#closeWindow').attr("disabled", "disabled");
            $('#donate').attr("disabled", "disabled");
            $('#spinner').addClass('show');
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.status === "success"){
                        $('#spinner').removeClass('show');
                        checkTransactionStatus(data.transaction_ref, data.stored_payment_id);
                        toastr.info(data.message);
                    }else {
                        $('#spinner').removeClass('show');
                        toastr.error(data.message)
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#spinner').removeClass('show');
                    console.log('error');
                }
            });

        }else{
            console.log("error in the number");
        }
    });



})(jQuery);
