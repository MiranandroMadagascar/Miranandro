<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('caisse', function (Blueprint $table) {
            $table->id('id_caisse');
            $table->foreignId('id_categorie_caisse')->constrained('categorie_caisse')->onDelete('cascade');
            $table->date('date_operation');
            $table->decimal('montant', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caisse');
    }
};
