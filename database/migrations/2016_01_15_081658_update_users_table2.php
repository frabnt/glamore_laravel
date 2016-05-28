<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
         $table->string('last_name')->nullable();   
         $table->string('marital_status')->nullable();
         $table->string('background_image')->nullable();
         $table->string('profile_image')->nullable();
         $table->string('facebook_page')->nullable();
         $table->string('twitter_page')->nullable();
         $table->string('linkedin_page')->nullable();
         $table->string('dribbble_page')->nullable();
         $table->string('gplus_page')->nullable();
         $table->date('birthday_date')->nullable();
         $table->text('about_me')->nullable();
         $table->boolean('terms_agreement')->default(0);
         $table->boolean('deleted')->default(0);
         $table->boolean('active')->default(1);
         $table->boolean('newsletter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
         $table->dropColumn(['last_name']);
         $table->dropColumn(['birthday_date']);
         $table->dropColumn(['marital_status']);
         $table->dropColumn(['newsletter']);
         $table->dropColumn(['terms_agreement']);
         $table->dropColumn(['background_image']);
         $table->dropColumn(['profile_image']);
         $table->dropColumn(['about_me']);
         $table->dropColumn(['facebook_page']);
         $table->dropColumn(['twitter_page']);
         $table->dropColumn(['linkedin_page']);
         $table->dropColumn(['dribbble_page']);
         $table->dropColumn(['gplus_page']);
        });
         
    }
}
