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
        Schema::create('crop_advisory_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_advisory_id');
            $table->foreign('crop_advisory_id')->references('id')->on('crop_advisories')->onDelete('cascade');
            $table->string('title');
            $table->string('banner')->nullable();
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_advisory_details');
    }
};
