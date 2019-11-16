<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empnumber');
            $table->string('fullname');
            $table->text('compname');
            $table->text('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('maritalstatus');
            $table->string('appointmentdate');
            $table->integer('bank_id');
            $table->string('bankaccount');
            $table->string('basicsalary');
            $table->string('netpay');
            $table->string('totalallow');
            $table->string('deductions');
            $table->integer('department_id');
            $table->integer('empunion_id');
            $table->integer('rank_id');
            $table->integer('qualification_id');
            $table->text('empimage')->default('defaultuserimage.jpg');
            $table->tinyInteger('isactive')->default('1');
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
        Schema::dropIfExists('employees');
    }
}
