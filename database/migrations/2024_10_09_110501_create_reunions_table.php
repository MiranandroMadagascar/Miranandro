<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id('id_reunion');
            $table->foreignId('id_activite')->constrained('activites')->onDelete('cascade');
            $table->text('ordre_du_jour')->nullable();
            $table->text('proces_verbal')->nullable();
            $table->text('rapport')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reunions');
    }
};
