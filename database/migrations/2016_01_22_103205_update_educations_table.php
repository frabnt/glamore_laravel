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
        $table->date('date_end')->nullable(); 
        $table->date('date_start')->nullable(); 
        //$table->renameColumn('field_of_Study', 'field_of_study');
        $table->dropColumn('dates_attended');
        $table->dropColumn('field_of_Study');
        //$table->string('field_of_study')->nullable();
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
                $table->dropColumn('date_end');
                $table->dropColumn('date_start');
            
        });
    }
}
