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
        Schema::create('pick_and_drops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('delivery_boy_id')->nullable();
            $table->foreign('delivery_boy_id')->references('id')->on('delivery_boys')->cascadeOnDelete();
            $table->boolean('is_picked_up')->default(false);
            $table->boolean('is_drop_out')->default(false);
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->string('pickup_time')->nullable();
            $table->string('drop_time')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_contact')->nullable();
            $table->double('charges')->default(0);
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pick_and_drops');
    }
};
