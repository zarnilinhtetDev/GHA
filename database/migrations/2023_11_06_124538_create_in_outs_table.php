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
            $table->string('paydate')->nullable();
            $table->string('payprice')->nullable();
            $table->string('paydescription')->nullable();
            $table->string('yadate')->nullable();
            $table->string('yaprice')->nullable();
            $table->string('yadescription')->nullable();
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
