<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class oneseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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


        DB::table('kategori')->truncate();
        $label=['Tools','Material','Furnitur','Aksesoris','Listrik','Lainnya'];
        foreach ($label as $key => $value) {
            DB::table('kategori')->insert([
                'nama' => $value,
                'kode' => Str::slug(strtolower($value)),
                'prefix' => 'label',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);
        }


        DB::table('produk')->truncate();
        $produk = collect([
            [
                'nama'=>'Paku kayu tembok dinding',
                'harga_jual'=>14000,
                'satuan'=>'Gram',
                'desc'=>'Kondisi: Baru, Berat:50gr',
            ],
            [
                'nama'=>'Keramik 40x40 krem ivory motif marble marmer asap',
                'harga_jual'=>42000,
                'satuan'=>'Gram',
                'desc'=>'Kondisi: Baru, Berat :200gr',
            ],
            [
                'nama'=>'Tang toho professional cutting pliers 7 kualitas bagus',
                'harga_jual'=>105000,
                'satuan'=>'Pcs',
                'desc'=>'Kondisi: Baru, Berat:500gr',
            ],
            [
                'nama'=>'Palu Tukang kombinasi konde bulat kambing pencabut Paku',
                'harga_jual'=>27000,
                'satuan'=>'Pcs',
                'desc'=>'Kondisi: Baru, Berat:450gr',
            ]
        ]);
        //make object produk example


        foreach ($produk as $item) {
            DB::table('produk')->insert([
                'nama' => $item['nama'],
                'harga_jual' => $item['harga_jual'],
                'slug' => Str::slug(strtolower($item['nama'])),
                'desc' => $item['desc'],
                'satuan' => $item['satuan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);
        }
    }
}
