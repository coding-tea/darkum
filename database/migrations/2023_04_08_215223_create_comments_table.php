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
        Schema::create('comments', function (Blueprint $table) {
            $table->id("idCom");
            $table->text("comment");
            $table->integer('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('idAnnounce');
            $table->foreign('idAnnounce')->references('id')->on('announces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
