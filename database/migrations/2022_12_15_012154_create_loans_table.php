<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('date');
            $table->dateTime('finish_date')->nullable();


            $table->string('status');
            $table->string('person_name');
            $table->string('person_phone');
            $table->string('person_address');
            $table->string('total_amount');
            $table->string('paid_amount');
            $table->string('due_amount');
            $table->string('paid_by');
            $table->string('payment_method');

            $table->string('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
