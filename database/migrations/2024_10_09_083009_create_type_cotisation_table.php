<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('type_cotisation', function (Blueprint $table) {
            $table->id('id_type_cotisation');
            $table->string('nom_cotisation', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_cotisation');
    }
};
