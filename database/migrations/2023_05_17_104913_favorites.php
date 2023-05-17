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
        Schema::table('announces_users', function (Blueprint $table) {
            $table->foreignId("userId")->constraide("users");
            $table->foreignId("AnnounceId")->constraide("announces");
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
        Schema::table('announces_users', function (Blueprint $table) {
            //
        });
    }
};