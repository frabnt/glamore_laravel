<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school');
            $table->string('degree')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('grade')->nullable();
            $table->string('activities_and_societies')->nullable();
            $table->text('description')->nullable();
            $table->date('date_end')->nullable(); 
            $table->date('date_start')->nullable(); 
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
        Schema::drop('educations');
    }
}
