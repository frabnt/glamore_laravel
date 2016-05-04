<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->text('module')->nullable();
            $table->text('user_id_from')->nullable();
            $table->text('user_id_to')->nullable();
            $table->text('team_id')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['module']);
            $table->dropColumn(['user_id_from']);
            $table->dropColumn(['user_id_to']);
            $table->dropColumn(['team_id']);
      });
    }
}
