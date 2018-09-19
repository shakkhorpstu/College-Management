<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTeachersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('subject_teachers', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('subject_id');
      $table->unsignedInteger('teacher_id');
      $table->string('file');
      $table->timestamps();

      $table->foreign('subject_id')->references('id')->on('subjects');
      $table->foreign('teacher_id')->references('id')->on('teachers');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('subject_teachers');
  }
}
