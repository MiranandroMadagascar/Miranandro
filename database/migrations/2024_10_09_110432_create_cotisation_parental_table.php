<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cotisation_parental', function (Blueprint $table) {
            $table->id('id_cotisation_parental');
            $table->foreignId('id_parent_tuteur')->constrained('membres_parents_tuteurs')->onDelete('cascade');
            $table->date('date_payement');
            $table->decimal('montant', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotisation_parental');
    }
};
