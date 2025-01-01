<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crop_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            $table->unsignedBigInteger('expert_id')->nullable(); // Mark expert_id as nullable
            $table->foreign('expert_id')->references('id')->on('users')->onDelete('set null'); // Add foreign key constraint with ON DELETE behavior
        
            $table->unsignedBigInteger('crop_id');
            $table->foreign('crop_id')->references('id')->on('sub_crops')->onDelete('cascade');
        
            $table->unsignedBigInteger('crop_category_id');
            $table->foreign('crop_category_id')->references('id')->on('farmitra_crops')->onDelete('cascade');
        
            $table->string('infected_crop_part')->nullable();
            $table->string('problem_title');
            $table->text('problem_description');
            $table->string('image');
        
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_crop_diagnosis');
    }
};
