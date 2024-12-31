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
        Schema::create('crop_timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_id'); // Foreign key to farmers
            $table->foreign('crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_timelines');
    }
};
