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
        Schema::table('produk', function ($table) {
            $table->string('berat')->default('100')->nullable(); //pergram untuk harga ongkir
        });

        Schema::table('transaksi', function ($table) {
            $table->string('provinsi_id')->default('11')->nullable(); // 11 - jatim
            $table->string('city_id')->default('255')->nullable(); //
            $table->string('weight')->default('100')->nullable(); //pergram untuk harga ongkir
            $table->string('courir')->default('jne')->nullable(); //
            $table->string('ongkir')->default('0')->nullable(); //
            $table->string('totaltagihan')->default('0')->nullable(); //
            $table->string('telp')->default('0')->nullable(); //
        });

        Schema::table('transaksidetail', function ($table) {
            $table->string('jml_berat')->default('100')->nullable(); //pergram untuk harga ongkir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produk', function ($table) {
            $table->dropColumn('berat');
        });

        Schema::table('transaksi', function ($table) {
            $table->dropColumn('provinsi_id');
            $table->dropColumn('city_id');
            $table->dropColumn('weight');
            $table->dropColumn('courir');
            $table->dropColumn('ongkir');
            $table->dropColumn('totaltagihan');
            $table->dropColumn('telp');
        });

        Schema::table('transaksidetail', function ($table) {
            $table->dropColumn('jml_berat');
        });
    }
};
