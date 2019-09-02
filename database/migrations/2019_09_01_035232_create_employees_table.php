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
            $table->integer('bankid');
            $table->string('bankaccount');
            $table->decimal('basicsalary', 10, 2);
            $table->decimal('netpay', 10, 2);
            $table->decimal('totalallow', 10, 2);
            $table->decimal('deductions', 10, 2);
            $table->integer('departmentid');
            $table->integer('empunionid');
            $table->integer('rankid');
            $table->integer('qualificationid');
            $table->text('empimage');
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
