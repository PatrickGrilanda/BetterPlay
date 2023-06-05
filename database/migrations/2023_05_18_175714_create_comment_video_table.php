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
        Schema::create('comment_video', function (Blueprint $table) {
            $table->uuid('comment_id')->index();
            $table->foreign('comment_id')
                ->references('id')
                ->on('comments');
            $table->uuid('video_id')->index();
            $table->foreign('video_id')
                ->references('id')
                ->on('videos');
            $table->softDeletes();

            $table->unique(['comment_id', 'video_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_video');
    }
};
