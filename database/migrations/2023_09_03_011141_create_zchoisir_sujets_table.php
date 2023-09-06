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
        Schema::create('zchoisir_sujets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants'); // Assurez-vous que le nom de la table d'utilisateurs est correct
            $table->foreignId('professeur_id')->constrained('professeurs'); // Assurez-vous que le nom de la table d'utilisateurs est correct
            $table->foreignId('sujet_id')->constrained('sujets'); // Assurez-vous que le nom de la table des sujets est correct
            $table->boolean('statut')->default(false);
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zchoisir_sujets');
    }
};
