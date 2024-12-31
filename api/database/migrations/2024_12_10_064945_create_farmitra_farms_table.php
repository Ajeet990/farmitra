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
        Schema::create('farmitra_farms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id'); // Foreign key to farmers
            $table->string('name'); // Farm name
            $table->string('banner')->nullable(); // Farm name
            $table->string('location')->nullable();
            $table->decimal('size', 8, 2)->nullable(); // Size in acres
            $table->timestamps();
            $table->foreign('farmer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmitra_farms');
    }
};
