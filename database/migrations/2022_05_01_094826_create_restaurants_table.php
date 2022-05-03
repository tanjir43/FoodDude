<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('slogan');
            $table->string('mobile');
            $table->text('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('description')->nullable();


            $table->string('owner')->nullable();
            $table->text('ownerImage')->nullable();
            $table->string('established_at')->nullable();
            $table->string('region')->default('international');
            $table->text('physical_distancing')->nullable();
            $table->text('safety_cleaning')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->longText('map_link')->nullable();
            $table->longText('map_address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->mediumText('hours_of_operation')->nullable();
            $table->string('parking_details')->nullable();
            $table->string('payment_option')->default('cash');
            $table->string('payment_system')->default('pay_first');
            $table->mediumText('additional')->nullable();
            $table->string('website')->nullable();
            $table->longText('catering')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('linkedin_url')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
