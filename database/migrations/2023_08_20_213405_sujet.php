<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
     public function up(): void
    {
        Schema::disableForeignKeyConstraints();
    
        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->text('resume');
            $table->string('motCle');
            // $table->foreignId('professeur_id')->constrained();
            $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('professeur_id')->constrained('professeurs');

            $table->foreignId('professeur_id')->constrained('professeurs');

            $table->boolean('is_valide')->default(false); // Ajout de la colonne is_valide
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujets');
    }
};
