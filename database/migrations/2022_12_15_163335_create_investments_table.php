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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('date');
            // $table->dateTime('finish_date');
            $table->string('amount');

            $table->string('client_name');
            $table->string('purpose');
            $table->string('remark');
            $table->string('image');
            $table->string('payment_method');
            $table->string('created_by');
            $table->string('status');
            $table->string('amount_taken_from')->nullable(
                
            );

            // $table->string('person_address');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
};
