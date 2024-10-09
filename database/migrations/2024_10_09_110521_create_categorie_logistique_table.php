<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorie_logistique', function (Blueprint $table) {
            $table->id('id_categorie_logistique');
            $table->string('nom_categorie', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorie_logistique');
    }
};
