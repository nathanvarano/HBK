<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('reviewer_first_name');
            $table->string('reviewer_last_name');
            $table->integer('reviewer_age');
            $table->integer('movie_id');
            $table->integer('rating');
            $table->string('review');
            $table->integer('location_id');
            $table->boolean('viewed_in_gold_class');
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
        Schema::dropIfExists('movie_reviews');
    }
};
