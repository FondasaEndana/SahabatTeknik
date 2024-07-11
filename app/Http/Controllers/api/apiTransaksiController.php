<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\image;
use App\Models\transaksi;
use App\Models\transaksidetail;
use Illuminate\Http\Request;

class apiTransaksiController extends Controller
{
    public function detail($item,Request $request){
        $bukti=null;
        //periksa bukti
        $getImages=image::where('parrent_id',$item)->where('prefix','buktipembayaran')->first();
        if($getImages){
            $bukti=url('/').'/'.$getImages->photo;
        }
        $transaksi=transaksi::where('id',$item)->first();
        $items=transaksidetail::with('produk')->with('transaksi')->where('transaksi_id',$item)->get();
        return response()->json([
            'success'    => true,
            'data'    => $items,
            'bukti'    => $bukti,
            'kodetrans'    => $transaksi->kodetrans,
        ], 200);
    }
}
