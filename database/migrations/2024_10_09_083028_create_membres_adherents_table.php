<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membres_adherents', function (Blueprint $table) {
            $table->id('id_membre_adherent');
            $table->string('numero', 100);
            $table->string('nom', 100);
            $table->string('prenoms', 200);
            $table->date('date_naissance');
            $table->string('genre', 10)->nullable();
            $table->string('contact', 150);
            $table->string('adresse', 200);
            $table->date('date_adhesion')->nullable();
            $table->foreignId('id_section')->constrained('section')->onDelete('cascade');
            $table->string('email', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membres_adherents');
    }
};
