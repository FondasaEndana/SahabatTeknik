<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\label;
use App\Models\produk;
use App\Models\produkdetail;
use App\Models\restok;
use App\Models\settings;
use App\Models\transaksi;
use App\Models\transaksidetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class seederController extends Controller
{
    public function kategori(){
        $jmlseeder=5;
        $faker = Faker::create('id_ID');

        for($i=0;$i<$jmlseeder;$i++){
            DB::table('kategori')->insert([
                'nama' => $faker->unique()->name,
                'prefix' => $faker->unique()->address,
                'kode'=>$faker->unique()->username,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }
    public function hard(){
        kategori::truncate();
        transaksi::truncate();
        transaksidetail::truncate();
        produk::truncate();
        produkdetail::truncate();
        restok::truncate();
        label::truncate();
        kategori::truncate();

        DB::table('users')->truncate();
        //ADMIN SEEDER
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            // 'password' => '$2y$10$oOhE/tcF8MC9crGCw/Zv5.zFMGu0JLm591undChCaHJM6YrnGjgCu',
            'tipeuser' => 'admin',
            'nomerinduk' => '123',
            'username' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);



        DB::table('users')->insert([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner'),
            // 'password' => '$2y$10$oOhE/tcF8MC9crGCw/Zv5.zFMGu0JLm591undChCaHJM6YrnGjgCu',
            'tipeuser' => 'owner',
            'nomerinduk' => '123',
            'username' => 'owner',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

        DB::table('settings')->truncate();
         //settings SEEDER
        DB::table('settings')->insert([
            'app_nama' => 'Nama App',
            'app_namapendek' => 'Bae',
            'paginationjml' => '10',
            'lembaga_nama' => 'PT Baemon Indonesia',
            'lembaga_jalan' => 'Jl.Raya Ramai Sekali No 2 Kav. B',
            'lembaga_telp' => '0341-123456',
            'lembaga_kota' => 'Malang',
            'lembaga_logo' => 'assets/upload/logo.png',
            'bank_nama' => 'Bank BRI',
            'bank_rekening' => '5252-123456-123',
            'desc' => 'Termurah, Terpercaya dan Terlengkap.',
            'desc2' => 'Semua ada semua bisa.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);


        DB::table('pelanggan')->truncate();
        $pelanggan = collect([
            [
                'nama'=>'Salmon',
                'jk'=>'Laki-laki',
                'alamat'=>'malang',
                'telp'=>'08123456789',
                'email'=>'pelanggan@gmail.com',
                'username'=>'pelanggan',
                'password'=>'pelanggan',
            ],
            [
                'nama'=>'Sri',
                'jk'=>'Perempuan',
                'alamat'=>'malang',
                'telp'=>'08123456799',
                'email'=>'sri@gmail.com',
                'username'=>'sri',
                'password'=>'sri',
            ],
            [
                'nama'=>'Joko',
                'jk'=>'Laki-laki',
                'alamat'=>'malang',
                'telp'=>'08234123123',
                'email'=>'joko@gmail.com',
                'username'=>'joko',
                'password'=>'joko',
            ],
        ]);

        foreach ($pelanggan as $item) {
            $users_id=DB::table('users')->insertGetId([
                'name' => $item['nama'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
                // 'password' => '$2y$10$oOhE/tcF8MC9crGCw/Zv5.zFMGu0JLm591undChCaHJM6YrnGjgCu',
                'tipeuser' => 'pelanggan',
                'nomerinduk' => null,
                'username' => $item['username'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);

            DB::table('pelanggan')->insert([
                'nama' => $item['nama'],
                'jk' => $item['jk'],
                'alamat' => $item['alamat'],
                'telp' => $item['telp'],
                'users_id' => $users_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);
        }

         return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }

    public function soft(){
        kategori::truncate();
        transaksi::truncate();
        transaksidetail::truncate();
        produk::truncate();
        produkdetail::truncate();
        restok::truncate();
        label::truncate();
        kategori::truncate();
        return redirect()->route('dev.settings')->with('status','Proses berhasil !')->with('tipe','success');
    }
}
