<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section', function (Blueprint $table) {
            $table->id('id_section');
            $table->string('nom_section', 100);
            $table->foreignId('id_volet')->constrained('volet')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('section');
    }

};
