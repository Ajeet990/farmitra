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
        Schema::create('farm_crop_timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_timeline_id'); // Foreign key to farmers
            $table->foreign('crop_timeline_id')->references('id')->on('crop_timelines')->onDelete('cascade');
            $table->unsignedBigInteger('farm_crop_id'); // Foreign key to farmers
            $table->foreign('farm_crop_id')->references('id')->on('farmer_farm_crops')->onDelete('cascade');
            $table->boolean('is_completed')->default(false);
            $table->string('is_completed_date')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('farm_crop_timelines');
    }
};
