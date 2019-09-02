<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecexpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recexpenditures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('departmentid');
            $table->integer('ledgerid');
            $table->integer('employeeid');
            $table->integer('servicetypeid');
            $table->decimal('amountapproved',10,2);
            $table->string('monthyear');
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
        Schema::dropIfExists('recexpenditures');
    }
}
