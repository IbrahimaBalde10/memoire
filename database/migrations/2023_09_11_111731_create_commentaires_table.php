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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Assurez-vous que le nom de la table d'utilisateurs est correct
            $table->foreignId('fiche_suivie_id')->constrained('fiche_suivies'); // Assurez-vous que le nom de la table d'utilisateurs est correct
            $table->text('contenu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
