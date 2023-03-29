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
        Schema::create('off_banners', function (Blueprint $table) {
            $table->id();
            $table->string('fbanner_offer')->nullable();
            $table->string('fbanner_titel')->nullable();
            $table->string('fbanner_img');
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
        Schema::dropIfExists('off_banners');
    }
};
