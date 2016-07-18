<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('timezone')->nullable();
            $table->text('currency_name')->nullable();
            $table->text('currency_symbol')->nullable();
            $table->text('date_format')->nullable();
            $table->text('time_format')->nullable();
            $table->text('thousand_separator')->nullable();
            $table->text('decimal_symbol')->nullable();
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
        Schema::drop('admin_settings');
    }
}
