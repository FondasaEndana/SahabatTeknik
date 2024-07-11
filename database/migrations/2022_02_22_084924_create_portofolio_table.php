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
        Schema::create('portofolio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('slug'); //link alternatif
            $table->string('tahun'); //tahun project
            $table->string('github')->nullable(); //link github
            $table->string('demo')->nullable(); //link github
            $table->softDeletes();
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
        Schema::dropIfExists('portofolio');
    }
};
