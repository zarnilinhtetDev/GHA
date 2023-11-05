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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_type')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_number')->nullable();
            $table->string('manufacture_year')->nullable();
            $table->string('License_expire')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_images')->nullable();


            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
