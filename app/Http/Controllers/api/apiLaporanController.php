<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\produkdetail;
use App\Models\restok;
use App\Models\transaksi;
use App\Models\ServiceRequest;
use App\Models\transaksidetail;
use Illuminate\Http\Request;

class apiLaporanController extends Controller
{
    public function restok(Request $request){
        $bln=$request->blnthn?date('m',strtotime($request->blnthn)):date('m');
        $thn=$request->blnthn?date('Y',strtotime($request->blnthn)):date('Y');
        $datas=restok::with('produkdetail')
        ->WhereMonth('tglbeli',$bln)
        ->WhereYear('tglbeli',$thn)
        ->orderBy('tglbeli','desc')
        ->get();
        $items=[];
        foreach($datas as $data){
            $arr=null;
            $arr['id']=$data->id;
            $arr['tglbeli']=$data->tglbeli;
            $arr['namatoko']=$data->namatoko;
            $jumlahproduk = produkdetail::where('restok_id',$data->id)->count();
            $jumlahbarang = produkdetail::where('restok_id',$data->id)->sum('jml');
            $arr['jumlahproduk']=$jumlahproduk;
            $arr['jumlahbarang']=$jumlahbarang;
            $arr['totalbayar']=$data->totalbayar;
            $arr['penanggungjawab']=$data->penanggungjawab;
            $arr['produkdetail']=$data->produkdetail;
            $items[]=$arr;
        }
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);

    }

    public function penjualan(Request $request){
        $bln=$request->blnthn?date('m',strtotime($request->blnthn)):date('m');
        $thn=$request->blnthn?date('Y',strtotime($request->blnthn)):date('Y');
        $datas=transaksi::with('transaksidetail')
        ->WhereMonth('tglbeli',$bln)
        ->WhereYear('tglbeli',$thn)
        ->orderBy('tglbeli','desc')
        ->get();
        $items=[];
        foreach($datas as $data){
            $arr=null;
            $arr['id']=$data->id;
            $arr['tglbeli']=$data->tglbeli;
            $arr['pelanggan_id']=$data->pelanggan_id;
            $arr['pelanggan']=$data->pelanggan;
            $arr['transaksi_tipe']=$data->transaksi_tipe;
            $arr['status']=$data->status;
            $arr['pelanggan_tipe']=$data->pelanggan_tipe;
            $jumlahproduk = transaksidetail::where('transaksi_id',$data->id)->count();
            $jumlahbarang = transaksidetail::where('transaksi_id',$data->id)->sum('jml');
            $arr['jumlahproduk']=$jumlahproduk;
            $arr['jumlahbarang']=$jumlahbarang;
            $arr['totalbayar']=$data->totalbayar;
            $arr['penanggungjawab']=$data->penanggungjawab;
            $arr['transaksidetail']=$data->transaksidetail;
            $items[]=$arr;
        }
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);

    }

    public function jasa(Request $request){
        $bln = $request->blnthn ? date('m', strtotime($request->blnthn)) : date('m');
        $thn = $request->blnthn ? date('Y', strtotime($request->blnthn)) : date('Y');
        $datas = ServiceRequest::whereMonth('created_at', $bln)
            ->whereYear('created_at', $thn)
            ->orderBy('created_at', 'desc')
            ->get();
        $items = [];
        foreach ($datas as $data) {
            $arr = null;
            $arr['id'] = $data->id;
            $arr['name'] = $data->name;
            $arr['email'] = $data->email;
            $arr['phone'] = $data->phone;
            $arr['service_type'] = $data->service_type;
            $arr['description'] = $data->description;
            $arr['price'] = $data->price;
            $arr['created_at'] = $data->created_at->format('Y-m-d');
            $items[] = $arr;
        }
        return response()->json([
            'success' => true,
            'data' => $items,
        ], 200);
    }
}
