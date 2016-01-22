<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educations', function (Blueprint $table) {

        $table->string('field_of_study')->nullable();
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
         $table->dropColumn('field_of_study');
            
        });
    }
}
