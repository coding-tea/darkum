<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announces', function (Blueprint $table) {
            $table->id();
            $table->string("title", 100);
            $table->text("description");
            $table->enum('typeL', ['location', 'vente', 'vacance'])->default('location');
            $table->enum('type', ['Appartement', 'Maison', 'Villa', "Chambres", "Terrains", "Fermes"])->default('Appartement');
            $table->unsignedFloat("price");
            $table->unsignedInteger("nbRome");
            $table->string("surface", 20);
            $table->string("city", 50);
            $table->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announces');
    }
};
