<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountreceivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountreceivables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customername');
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
        Schema::dropIfExists('accountreceivables');
    }
}
