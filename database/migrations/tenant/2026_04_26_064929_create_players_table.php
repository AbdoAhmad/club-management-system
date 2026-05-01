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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->json('description_plain')->nullable();
            $table->date('date_of_birth');
            $table->date('joined_at');
            $table->integer('jersey_number');
            $table->enum('status', ['active', 'banned', 'injured'])->default('active');
            $table->double('height');
            $table->double('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
