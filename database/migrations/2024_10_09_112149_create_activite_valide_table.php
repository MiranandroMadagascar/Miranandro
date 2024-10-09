<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activite_valide', function (Blueprint $table) {
            $table->id('id_activite_valide');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->date('date_validation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activite_valide');
    }
};
