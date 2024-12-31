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
        Schema::create('sub_crops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmitra_crop_id');
            $table->string('name'); // Crop name
            $table->string('banner')->nullable(); // Crop name
            $table->timestamps();
            $table->foreign('farmitra_crop_id')->references('id')->on('farmitra_crops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_crops');
    }
};
