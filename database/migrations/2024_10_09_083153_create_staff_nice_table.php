<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staff_nice', function (Blueprint $table) {
            $table->id('id_staff');
            $table->string('nom', 100);
            $table->string('prenoms', 200);
            $table->date('date_naissance');
            $table->string('genre', 10)->nullable();
            $table->string('contact', 150);
            $table->string('adresse', 200);
            $table->foreignId('id_poste')->constrained('poste')->onDelete('cascade');
            $table->date('date_adhesion')->nullable();
            $table->string('email', 100);
            $table->string('mot_de_passe', 200);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_nice');
    }
};
