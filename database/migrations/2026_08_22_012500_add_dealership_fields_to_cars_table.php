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
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedSmallInteger('year')->nullable()->after('name');
            $table->string('model')->nullable()->after('year');
            $table->string('condition')->default('used')->after('model'); // 'new', 'used', 'certified'
            $table->string('status')->default('available')->after('condition'); // 'available', 'reserved', 'sold'
            $table->decimal('monthly_payment', 10, 2)->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['year', 'model', 'condition', 'status', 'monthly_payment']);
        });
    }
};
