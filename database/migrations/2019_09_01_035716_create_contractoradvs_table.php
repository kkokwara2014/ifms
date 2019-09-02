<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractoradvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractoradvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ledgerid');
            $table->integer('contractorid');
            $table->decimal('amount',10,2);
            $table->text('purpose');
            $table->text('awardedby');
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
        Schema::dropIfExists('contractoradvs');
    }
}
