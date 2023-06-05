<?php

use App\Enums\CensureType;
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
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('slug')->nullable();
            $table->smallInteger('year_launched')->nullable();
            $table->boolean('opened')->default(false);
            $table->string('censure')->nullable();
            $table->integer('rating')->nullable();
            $table->smallInteger('duration')->nullable();
            $table->string('path_media')->nullable();
            $table->string('media_type')->nullable();
            $table->string('path_encoded')->nullable();
            $table->string('media_status')->nullable();
            $table->string('path_banner')->nullable();
            $table->string('path_thumb')->nullable();
            $table->string('path_half_thumb')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
