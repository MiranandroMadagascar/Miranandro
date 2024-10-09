<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_activite', function (Blueprint $table) {
            $table->id('id_type_activite');
            $table->string('nom_activite', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_activite');
    }
};
