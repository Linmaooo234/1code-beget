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
        Schema::create('afisha', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nametov', 255);
            $table->string('description', 1000);
            $table->string('avatar', 255);
            $table->date('data');
            $table->string('nedelya', 255);
            $table->string('chislo', 255);
            $table->string('year', 255);
            $table->string('month', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afisha');
    }
};
