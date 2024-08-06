<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\restok;
use App\Models\transaksi;
use App\Models\ServiceRequest; // Pastikan model ini diimpor dengan benar
use Illuminate\Http\Request;
use PDF;

class cetakController extends Controller
{
    public function transaksi($item)
    {
        $items=transaksi::with('transaksidetail')->where('kodetrans',$item)->first();
        $tgl=date("YmdHis");
        $pdf = PDF::loadview('pages.dev.testing.cetak2',compact('items'))->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
    }

    public function restok_cetak(Request $request){
        $bln=$request->blnthn?date('m',strtotime($request->blnthn)):date('m');
        $thn=$request->blnthn?date('Y',strtotime($request->blnthn)):date('Y');
        $blnthn=$request->blnthn?$request->blnthn:date('Y-m');
        $items=restok::
        orderBy('tglbeli','desc')
        ->with('produkdetail')
        ->WhereMonth('tglbeli',$bln)
        ->WhereYear('tglbeli',$thn)
        ->orderBy('id','desc')
        ->get();
        $tgl=date("YmdHis");
        $pdf = PDF::loadview('pages.admin.laporan.restokcetak',compact('items','blnthn','bln','thn'))->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
    }

    public function penjualan_cetak(Request $request){
        $bln=$request->blnthn?date('m',strtotime($request->blnthn)):date('m');
        $thn=$request->blnthn?date('Y',strtotime($request->blnthn)):date('Y');
        $blnthn=$request->blnthn?$request->blnthn:date('Y-m');
        $items=transaksi::
        orderBy('tglbeli','desc')
        ->with('transaksidetail')
        ->WhereMonth('tglbeli',$bln)
        ->WhereYear('tglbeli',$thn)
        ->orderBy('id','desc')
        ->get();
        $tgl=date("YmdHis");
        $pdf = PDF::loadview('pages.admin.laporan.penjualancetak',compact('items','blnthn','bln','thn'))->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
    }

    public function jasa_cetak(Request $request){
        $bln=$request->blnthn?date('m',strtotime($request->blnthn)):date('m');
        $thn=$request->blnthn?date('Y',strtotime($request->blnthn)):date('Y');
        $blnthn=$request->blnthn?$request->blnthn:date('Y-m');
        $items = ServiceRequest::whereMonth('created_at', $bln)
            ->whereYear('created_at', $thn)
            ->orderBy('created_at', 'desc')
            ->get();
        $tgl = date("YmdHis");
        $pdf = PDF::loadview('pages.admin.laporan.jasaCetak',compact('items','blnthn','bln','thn'))->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
    }
}
