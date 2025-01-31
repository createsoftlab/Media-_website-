<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_post_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_post_id')->nullable();
            $table->string('post_image1')->nullable();
            $table->string('post_image2')->nullable();
            $table->string('post_image3')->nullable();
            $table->string('post_image4')->nullable();
            $table->timestamps();
            $table->foreign('event_post_id')->references('id')->on('event_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_post_images');
    }
};
