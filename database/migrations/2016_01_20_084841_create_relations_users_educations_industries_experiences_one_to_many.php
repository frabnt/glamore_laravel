<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsUsersEducationsIndustriesExperiencesOneToMany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educations', function (Blueprint $table) {
        $table->integer('user_id');
        });
        
        Schema::table('experiences', function (Blueprint $table) {
        $table->integer('user_id');
        });
        
        Schema::table('industries', function (Blueprint $table) {
        $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educations', function (Blueprint $table) {
        $table->dropColumn(['user_id']);
        });
        
        Schema::table('experiences', function (Blueprint $table) {
        $table->dropColumn(['user_id']);
        });
        
        Schema::table('industries', function (Blueprint $table) {
        $table->dropColumn(['user_id']);
        });

    }
}
