<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorie_caisse', function (Blueprint $table) {
            $table->id('id_categorie_caisse');
            $table->string('nom_categorie', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorie_caisse');
    }
};
