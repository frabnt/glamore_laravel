<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('title')->nullable();  
            $table->string('checked')->nullable();
            $table->string('description')->nullable();
            $table->boolean('done')->default(0);
            $table->integer('user_id')->nullable();  
            $table->integer('project_id')->nullable();  
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
        Schema::drop('todos');
    }
}
