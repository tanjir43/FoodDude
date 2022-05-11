<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('hour_id');
            $table->unsignedBigInteger('date_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name')->unique();
            $table->integer('priority')->default(1)->unique();
            $table->string('slug')->unique();
            $table->text('image')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            $table->foreign('hour_id')->references('id')->on('hours')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('cascade');
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
        Schema::dropIfExists('tables');
    }
}
