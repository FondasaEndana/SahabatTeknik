<?php

namespace App\Http\Controllers\pelanggan;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\image;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pelangganTransaksiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (Auth::user()->tipeuser != 'pelanggan') {
    //             return redirect()->route('dashboard')->with('status', 'Halaman tidak ditemukan!')->with('tipe', 'danger');
    //         }
    //         return $next($request);
    //     });
    // }
    public function index(Request $request)
    {
        $getPelanggan = pelanggan::where('users_id', Auth::user()->id)->first();
        #WAJIB
        $pages = 'transaksi';
        $items = transaksi::orderBy('tglbeli', 'desc')
            ->where('pelanggan_id', $getPelanggan->id)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('pages.pelanggan.transaksi.index', compact('items', 'request', 'pages'));
    }
    public function create()
    {
        $getPelanggan = pelanggan::where('users_id', Auth::user()->id)->first();
        $pages = 'keranjang';
        $faker = Faker::create('id_ID');
        $kodetrans = $faker->unique()->uuid();
        $pelanggan = pelanggan::where('id', $getPelanggan->id)->get();
        // dd($getPelanggan);
        return view('pages.pelanggan.transaksi.create', compact('pages', 'kodetrans', 'pelanggan', 'getPelanggan'));
    }
    public function store(Request $request)
    {
        $getPelanggan = pelanggan::where('users_id', Auth::user()->id)->first();
        $periksapending = transaksi::where('pelanggan_id', $getPelanggan->id)->where('status', 'pending')->count();
        if ($periksapending > 0) {
            return redirect()->route('pelanggan.transaksi.create')->with('status', 'Gagal tambahkan! Menunggu proses transaksi sebelumnya!')->with('tipe', 'error')->with('icon', 'fas fa-feather');
        }
        $datakeranjang = null;
        if ($request->cart) {
            $datakeranjang = json_decode($request->cart);
        }
        // dd($request,$datakeranjang);
        $request->validate(
            [
                'pelanggan_id' => 'required',
                // 'penanggungjawab'=>'required',
                'tglbeli' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pelanggan harus diisi',
            ]
        );
        // dd($request);
        $status = 'success';
        if ($request->transaksi_tipe == 'online') {
            $status = 'pending';
        }
        $data_id = DB::table('transaksi')->insertGetId(
            array(
                'kodetrans'     =>   $request->kodetrans,
                'pelanggan_tipe'     =>   'member',
                'transaksi_tipe'     =>   'online',
                'pelanggan_id'     =>   $getPelanggan->id,
                'totaltagihan'     =>    Fungsi::angka($request->totaltagihan),
                'totalbayar'     =>    Fungsi::angka($request->totalbayar),
                'dibayar'     =>    Fungsi::angka($request->totalbayar),
                'ongkir'     =>    Fungsi::angka($request->ongkir),
                'weight'     =>    Fungsi::angka($request->weight),
                'kembalian'     =>   0,
                'penanggungjawab'     =>   'member',
                'tglbeli'     =>   $request->tglbeli,
                'alamat'     =>   $request->alamat,
                'telp'     =>   $request->telp,
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
        return redirect()->route('pelanggan.transaksi')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');

        // dd($request);
    }

    public function uploadbukti(Request $request, $item)
    {
        $items = transaksi::with('transaksidetail')->where('kodetrans', $item)->first();
        $getPelanggan = pelanggan::where('users_id', Auth::user()->id)->first();
        $pages = 'transaksi';
        $faker = Faker::create('id_ID');
        $pelanggan = pelanggan::where('id', $getPelanggan->id)->get();
        return view('pages.pelanggan.transaksi.uploadbukti', compact('pages', 'items', 'pelanggan', 'getPelanggan'));
    }

    public function uploadbukti_store(Request $request, $kodetrans)
    {
        $transaksi_id = transaksi::where('kodetrans', $kodetrans)->first();


        // dd($request,$transaksi_id);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);



        $imageName = time() . '.' . $request->photo->extension();

        $periksa = image::where('parrent_id', $transaksi_id->id)->count();
        if ($periksa > 0) {
            $hapus = image::where('parrent_id', $transaksi_id->id)->get();
            foreach ($hapus as $item) {
                $path = public_path($item->photo);
                if (file_exists($path)) {
                    unlink($path);
                }
                $item->delete();
            }
        }
        $data_id = DB::table('image')->insertGetId(
            array(
                'nama'     =>   $imageName,
                'prefix'     =>   'buktipembayaran',
                'parrent_id'     =>   $transaksi_id->id,
                'desc'     =>   'Bukti pembayaran transaksi',
                'photo'     =>   'images/bukti/' . $imageName,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        $request->photo->move(public_path('images/bukti'), $imageName);



        return redirect()->route('pelanggan.transaksi')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
        // return
    }

    public function rajaongkir_province(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province", //id=11 jatim
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:b36ac6ff20a865173409d6107da115e3"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    public function rajaongkir_city(Request $request)
    {
        $provinsi_id = $request->provinsi_id ? $request->provinsi_id : 11;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province={$provinsi_id}",
            // CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province={$provinsi_id}&id=74", //blitar
            // CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=11&id=255", //malang
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:b36ac6ff20a865173409d6107da115e3"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    public function rajaongkir_cost(Request $request)
    {

        $origin = 255; //malang
        $provinsi_id = $request->provinsi_id ? $request->provinsi_id : 11;
        $city_id = $request->city_id ? $request->city_id : 74;
        $weight = $request->weight ? $request->weight : 100;
        $courir = $request->courir ? $request->courir : 'jne';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin={$origin}&destination={$city_id}&weight={$weight}&courier={$courir}",  //berat dalam gram
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: b36ac6ff20a865173409d6107da115e3"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
