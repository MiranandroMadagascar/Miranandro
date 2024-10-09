<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mouvement_logistique', function (Blueprint $table) {
            $table->id('id_mouvement');
            $table->foreignId('id_logistique')->constrained('logistique')->onDelete('cascade');
            $table->foreignId('id_type_mouvement')->constrained('type_mouvement')->onDelete('cascade');
            $table->integer('quantite');
            $table->date('date_mouvement');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mouvement_logistique');
    }

};
