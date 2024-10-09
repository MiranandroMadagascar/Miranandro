<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membres_enfants', function (Blueprint $table) {
            $table->id('id_membre_beneficiaire');
            $table->string('numero', 100)->nullable();
            $table->string('nom', 100);
            $table->string('prenoms', 200);
            $table->date('date_naissance');
            $table->string('genre', 10)->nullable();
            $table->string('ecole', 100)->nullable();
            $table->string('classe', 100);
            $table->string('annee_scolaire', 100);
            $table->string('contact', 150);
            $table->string('adresse', 200);
            $table->integer('nombre_fratrie')->nullable();
            $table->date('date_adhesion')->nullable();
            $table->foreignId('id_pere')->nullable()->constrained('membres_parents_tuteurs')->onDelete('set null');
            $table->foreignId('id_mere')->nullable()->constrained('membres_parents_tuteurs')->onDelete('set null');
            $table->foreignId('id_tuteur')->nullable()->constrained('membres_parents_tuteurs')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membres_enfants');
    }
};
