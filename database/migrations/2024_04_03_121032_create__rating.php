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
            Schema::create('ratings', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
                $table->decimal('rating', 5, 2); // 5 est la précision totale et 2 est l'échelle (nombre de chiffres après la virgule)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
