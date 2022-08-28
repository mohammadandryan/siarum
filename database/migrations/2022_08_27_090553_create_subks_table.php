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
        Schema::create('subks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id');
            $table->string('nama', 50);
            $table->string('status', 50);
            $table->string('desk',500);
            $table->string('link',250);
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
        Schema::dropIfExists('subks');
    }
};
