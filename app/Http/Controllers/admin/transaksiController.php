<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->tipeuser != 'admin') {
                return redirect()->route('dashboard')->with('status', 'Halaman tidak ditemukan!')->with('tipe', 'danger');
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'transaksi';
        $items = transaksi::orderBy('tglbeli', 'desc')
            ->orderBy('id', 'desc')
            ->paginate();
        return view('pages.admin.transaksi.index', compact('items', 'request', 'pages'));
    }
    public function create()
    {
        $pages = 'transaksi';
        $faker = Faker::create('id_ID');
        $kodetrans = $faker->unique()->uuid();
        $pelanggan = pelanggan::get();
        return view('pages.admin.transaksi.create', compact('pages', 'kodetrans', 'pelanggan'));
    }
    public function store(Request $request)
    {
        $datakeranjang = null;
        if ($request->cart) {
            $datakeranjang = json_decode($request->cart);
        }
        // dd($request,$datakeranjang,empty($request->cart));
        $request->validate(
            [
                'pelanggan_id' => 'required',
                'penanggungjawab' => 'required',
                'tglbeli' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pelanggan harus diisi',
            ]
        );
        $status = 'success';
        if ($request->transaksi_tipe == 'online') {
            $status = 'pending';
        }
        $data_id = DB::table('transaksi')->insertGetId(
            array(
                'kodetrans'     =>   $request->kodetrans,
                'pelanggan_tipe'     =>   $request->pelanggan_tipe,
                'transaksi_tipe'     =>   $request->transaksi_tipe,
                'pelanggan_id'     =>   $request->pelanggan_id,
                'totaltagihan'     =>    Fungsi::angka($request->totaltagihan),
                'totalbayar'     =>    Fungsi::angka($request->totalbayar),
                'ongkir'     =>    Fungsi::angka($request->ongkir),
                'weight'     =>    Fungsi::angka($request->weight),
                'telp'     =>   $request->telp,
                'penanggungjawab'     =>   $request->penanggungjawab,
                'tglbeli'     =>   $request->tglbeli,
                'alamat'     =>   $request->alamat,
                'ppn'     =>   null,
                'dibayar'     =>   null,
                'kembalian'     =>   null,
                'status'     =>   $status, //pending.cancel,success,delivered
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        //transaksidetail store
        $jmlData = count($datakeranjang);
        for ($i = 0; $i < $jmlData; $i++) {
            if ($datakeranjang[$i]->inputTerjual > 0 || !empty($datakeranjang[$i]->inputTerjual)) {
                DB::table('transaksidetail')->insertGetId(
                    array(
                        'produk_id'     =>   $datakeranjang[$i]->id,
                        'transaksi_id'     =>   $data_id,
                        'harga_jual'     =>   $datakeranjang[$i]->inputTerjual ? $datakeranjang[$i]->inputTerjual : 0,
                        'jml'     =>   $datakeranjang[$i]->jumlah,
                        'diskon'     =>   0,
                        'harga_akhir'     =>   $datakeranjang[$i]->inputTerjual ? $datakeranjang[$i]->inputTerjual : 0,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    )
                );
            }
        }
        return redirect()->route('admin.transaksi')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');

        // dd($request);
    }
    public function destroy(transaksi $item)
    {

        transaksi::destroy($item->id);
        return redirect()->route('admin.transaksi')->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
    public function konfirmasi(transaksi $item, Request $request)
    {
        // dd($request);
        transaksi::where('id', $item->id)
            ->update([
                'status'     =>   $request->status,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        return redirect()->route('admin.transaksi')->with('status', 'Transaksi Berhasil!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
}
