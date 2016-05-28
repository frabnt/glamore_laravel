<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable(); 
            $table->text('timezone')->nullable();
            $table->text('currency_name')->nullable();
            $table->text('currency_symbol')->nullable();
            $table->text('user_type')->nullable();
            $table->text('date_format')->nullable();
            $table->text('time_format')->nullable();
            $table->text('1000s_separator')->nullable();
            $table->text('decimal_symbol')->nullable();
            $table->boolean('send_notification_by_mail')->default(0);
            $table->boolean('first_access')->default(0);
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
        Schema::drop('user_settings');
    }
}
