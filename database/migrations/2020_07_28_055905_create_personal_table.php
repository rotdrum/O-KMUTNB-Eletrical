<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pic_name');
            $table->string("name_thai");
            $table->string("name_eng");
            $table->string("position");
            $table->string("initial");
            $table->string("email");
            $table->string("contact");
            $table->string("tel");
            $table->string("bachelor");
            $table->string("master");
            $table->string("phd");
            $table->string("edu1");
            $table->string("edu2");
            $table->string("edu3");
            $table->string("edu4");
            $table->string("edu5");
            $table->string("file_name");
            $table->string("username");
            $table->string("password");
            $table->string("status");
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
        Schema::dropIfExists('personal');
    }
}
