<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membres_parents_tuteurs', function (Blueprint $table) {
            $table->id('id_parent_tuteur');
            $table->string('numero', 100)->nullable();
            $table->string('nom', 100);
            $table->string('prenoms', 200);
            $table->date('date_naissance');
            $table->string('genre', 10)->nullable();
            $table->string('profession', 200)->nullable();
            $table->string('contact', 150)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->date('date_adhesion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membres_parents_tuteurs');
    }
};
