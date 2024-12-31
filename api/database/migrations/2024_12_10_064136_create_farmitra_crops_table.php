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
        Schema::create('farmitra_crops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Crop name
            $table->string('banner')->nullable(); // Crop name
            $table->string('season')->nullable(); // Kharif, Rabi, etc.
            $table->string('soil_type')->nullable(); // Type of soil suitable
            $table->string('seed_type')->nullable(); // Hybrid, organic, etc.
            $table->string('region')->nullable(); // Regions where it's grown
            $table->decimal('water_requirement', 8, 2)->nullable(); // Water requirement (liters/hectare)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmitra_crops');
    }
};
