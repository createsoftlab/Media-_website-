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
        Schema::create('event_comments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('event_post_id'); // Foreign key to event_posts
            $table->unsignedBigInteger('user_id'); // Foreign key to users
            $table->longText('comment'); // The comment content
            $table->boolean('approved')->default(false);
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('event_post_id')->references('id')->on('event_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_comments');
    }
};
