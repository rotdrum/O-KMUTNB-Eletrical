<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('url', 1000);
            $table->string('student_id');
            $table->string('student_name');
            $table->string('sub');
            $table->string('tel');
            $table->string('email');
            $table->string('address');
            $table->string('type_address');
            $table->string('date_start');
            $table->string('date_end');
            $table->string('name_to');
            $table->string('name_subport');
            $table->string('tel_subport');

            $table->string('user_id');

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
        Schema::dropIfExists('operation');
    }
}
