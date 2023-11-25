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
        Schema::create('in_outs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id');
            $table->string('date')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('out_date')->nullable();
            $table->string('out_price')->nullable();
            $table->string('out_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('in_outs');
    }
};
