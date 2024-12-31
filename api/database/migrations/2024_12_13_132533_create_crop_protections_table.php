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
        Schema::create('crop_protections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_id');
            $table->foreign('crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
            $table->string('title');
            $table->string('banner');
            $table->json('banners');
            $table->longText('content');
            $table->string('audio')->nullable();
            $table->string('video')->nullable();
            $table->string('recommended_product_filter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_protections');
    }
};
