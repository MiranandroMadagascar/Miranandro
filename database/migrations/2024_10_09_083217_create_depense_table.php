<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('depense', function (Blueprint $table) {
            $table->id('id_depense');
            $table->foreignId('id_type_depense')->constrained('type_depense')->onDelete('cascade');
            $table->foreignId('id_activite')->constrained('activite')->onDelete('cascade');
            $table->date('date_depense');
            $table->decimal('montant', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depense');
    }
};
