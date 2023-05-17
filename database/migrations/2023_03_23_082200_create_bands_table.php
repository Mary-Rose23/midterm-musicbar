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
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string('band');
            $table->string('location');
            $table->string('contact');
            $table->decimal('rate');
            $table->string('genre');
            $table->longText('history');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bands');
    }
};
