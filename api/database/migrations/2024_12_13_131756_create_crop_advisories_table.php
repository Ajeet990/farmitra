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
        Schema::create('crop_advisories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_id');
            $table->foreign('crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('duration_title')->nullable();
            $table->integer('from')->nullable()->comment('in_week');
            $table->integer('to')->nullable()->comment('in_week');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_advisories');
    }
};
