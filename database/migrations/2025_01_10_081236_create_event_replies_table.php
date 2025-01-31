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
        Schema::create('event_replies', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('event_comment_id'); // Make sure this is unsignedBigInteger
        $table->unsignedBigInteger('user_id');
        $table->longText('reply');
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('event_comment_id')->references('id')->on('event_comments')->onDelete('cascade'); // Corrected table name
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_replies');
    }
};
