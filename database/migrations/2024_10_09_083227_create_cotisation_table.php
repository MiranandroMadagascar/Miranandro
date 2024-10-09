<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cotisation', function (Blueprint $table) {
            $table->id('id_cotisation');
            $table->foreignId('id_type_cotisation')->constrained('type_cotisation')->onDelete('cascade');
            $table->foreignId('id_membre_adherent')->constrained('membres_adherents')->onDelete('cascade');
            $table->date('date_cotisation');
            $table->decimal('montant', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotisation');
    }
};
