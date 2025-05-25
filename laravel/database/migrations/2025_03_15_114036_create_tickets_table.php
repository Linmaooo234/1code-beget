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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('row_number');
            $table->integer('seat_number');
            $table->integer('category');
            $table->decimal('price', 10, 2);
            $table->timestamp('purchase_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('afisha_id')->constrained('afishas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
