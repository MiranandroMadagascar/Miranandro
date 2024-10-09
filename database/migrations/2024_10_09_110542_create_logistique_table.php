<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('logistique', function (Blueprint $table) {
            $table->id('id_logistique');
            $table->string('nom_article', 100);
            $table->foreignId('id_categorie_logistique')->constrained('categorie_logistique')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logistique');
    }
};
