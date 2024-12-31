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
        Schema::create('farmer_farm_crops', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('farmer_id'); // Foreign key for farmers
            $table->unsignedBigInteger('crop_id');   // Foreign key for crops
            $table->unsignedBigInteger('farm_id');   // Foreign key for farms
            $table->string('banner')->nullable();    // Optional banner field
            $table->string('field_area')->nullable();
            $table->string('variety')->nullable();
            $table->boolean('is_sowing')->default(false);
            $table->string('sowing_date')->nullable();
            $table->string('sowing_type')->default('seed');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('farmer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
            $table->foreign('farm_id')->references('id')->on('farmitra_farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_farm_crops');
    }
};
