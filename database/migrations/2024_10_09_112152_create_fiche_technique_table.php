<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fiche_technique', function (Blueprint $table) {
            $table->id('id_fiche_technique');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->text('objectif')->nullable();
            $table->text('methodologie')->nullable();
            $table->text('participants')->nullable();
            $table->text('justifications')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiche_technique');
    }
};
