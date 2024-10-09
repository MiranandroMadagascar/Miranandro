<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->id('id_facture');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->string('numero', 100);
            $table->foreignId('responsable')->constrained('membres_adherents')->onDelete('cascade');
            $table->string('nom_client', 300)->nullable();
            $table->date('date_facture');
            $table->decimal('montant_total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facture');
    }
};
