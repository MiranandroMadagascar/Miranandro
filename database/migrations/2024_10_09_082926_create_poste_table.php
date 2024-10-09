<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('poste', function (Blueprint $table) {
            $table->id('id_poste');
            $table->string('nom_poste', 150)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poste');
    }
};
