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
        Schema::create('farmer_farm_timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id'); // Foreign key to farmers
            $table->foreign('farmer_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('farm_crop_id'); // Foreign key to farmers
            $table->foreign('farm_crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
            $table->string('sowing_date')->nullable();
            $table->boolean('is_sowing_completed')->default(false);
            $table->string('irrigation_date')->nullable();
            $table->boolean('is_irrigation_completed')->default(false);
            $table->string('fertilizers_date')->nullable();
            $table->boolean('is_fertilizers_completed')->default(false);
            $table->string('pestisides_date')->nullable();
            $table->boolean('is_pestisides_completed')->default(false);
            $table->string('harvest_date')->nullable();
            $table->boolean('is_harvest_completed')->default(false);
            $table->string('completed_date')->nullable();
            $table->boolean('is_completed_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_farm_timelines');
    }
};
