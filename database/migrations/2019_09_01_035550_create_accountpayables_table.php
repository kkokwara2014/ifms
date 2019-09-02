<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountpayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountpayables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ledgerid');
            $table->string('creditorname');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->decimal('amount',10,2);
            $table->text('narration');
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
        Schema::dropIfExists('accountpayables');
    }
}
