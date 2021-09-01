<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('research_id');
            $table->string('research_type');
            $table->string('format');
            $table->string('thai_name');
            $table->string('eng_name');
            $table->string('year');
            $table->string('term');
            $table->string('class');
            $table->string('teacherid_one');
            $table->string('teacherid_two');
            $table->string('teacherid_three');
            $table->string('teachername_two');
            $table->string('teachername_three');
            $table->string('student_one');
            $table->string('student_two');
            $table->string('student_three');
            $table->string('file_type');
            $table->string('file_name');
            $table->string('status');
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
        Schema::dropIfExists('research');
    }
}
