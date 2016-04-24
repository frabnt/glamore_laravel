<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(); 
            $table->string('description')->nullable(); 
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable(); 
            $table->integer('duration_day')->nullable();  
            $table->integer('progress')->nullable();  
            $table->string('priority')->nullable(); 
            $table->string('client')->nullable();
            $table->string('status')->nullable(); 
            $table->integer('team_id')->nullable(); 
            $table->integer('user_id')->nullable(); 
            $table->boolean('deleted')->default(0);
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
        Schema::drop('projects');
    }
}
 