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
        Schema::create('produkdetail', function (Blueprint $table) {
            //stok
            $table->bigIncrements('id');
            $table->string('produk_id');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('jml'); //stok
            $table->string('restok_id');
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
        Schema::dropIfExists('produkdetail');
    }
};
