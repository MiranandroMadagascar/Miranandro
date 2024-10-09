<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_depense', function (Blueprint $table) {
            $table->id('id_type_depense');
            $table->string('nom_depense', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_depense');
    }
};
