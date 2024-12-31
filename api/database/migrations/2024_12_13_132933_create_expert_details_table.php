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
        Schema::create('expert_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country')->default('india');
            $table->string('expertise')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('is_mobile_contacted')->default(false);
            $table->string('whatsapp_mobile')->nullable();
            $table->boolean('is_whatsapp_contacted')->default(false);
            $table->double('support_charges')->nullable();
            $table->double('platform_fee')->nullable();
            $table->double('wallet')->default(0.0);
            $table->string('aadhar')->nullable();
            $table->string('pan')->nullable();
            $table->string('qualification')->nullable();
            $table->string('certificate')->nullable();
            $table->string('current_location')->nullable();
            $table->string('facebbok_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('any_other_link')->nullable();
            $table->boolean('is_link_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_details');
    }
};
