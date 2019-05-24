<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tutorial_name');
            $table->text('tutorial_type');
            $table->text('tutorial_path');
            $table->text('tutorial_filename');
            $table->text('tutorial_extension');
            $table->text('tutorial_mimetype');
            $table->text('tutorial_image');
            $table->text('tutorial_description');
            $table->text('tutorial_dirname');
            $table->integer('tutorial_size');
            $table->text('tutorial_basename');
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
        Schema::dropIfExists('tutorials');
    }
}
