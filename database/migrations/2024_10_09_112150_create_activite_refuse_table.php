<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('activite_refuse', function (Blueprint $table) {
            $table->id('id_activite_refuse');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->date('date_refus');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activite_refuse');
    }
};
