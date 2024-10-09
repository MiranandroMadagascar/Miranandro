<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->id('id_presence');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->foreignId('id_membre_adherent')->constrained('membres_adherents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presence');
    }
};
