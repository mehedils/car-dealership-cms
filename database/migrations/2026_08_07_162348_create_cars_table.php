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
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fuel_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->string('duration')->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->boolean('is_featured')->default(false);
            $table->integer('mileage')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('doors')->nullable();
            $table->string('luggage')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->text('included_in_price')->nullable();
            $table->text('description')->nullable();
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
