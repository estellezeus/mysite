<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->string('cool-pay-reference')->nullable();
            $table->string('transaction_type')->nullable();
            $table->double('donation_amount')->nullable();
            $table->double('transaction_fees')->nullable();
            $table->string('transaction_currency')->nullable();
            $table->string('transaction_operator')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('donator_name')->nullable();
            $table->integer('donator_phone')->nullable();
            $table->string('donator_mail')->nullable();
            $table->string('donation_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
