<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use App\Models\produk;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $pages='portofolio';
        $items=portofolio::with('label')->get();
        return view('pages.landing.portofolio.index',compact('items','pages'));
    }
    public function produkshow($slug){
        $pages='produk';
        $items=produk::where('slug',$slug)->first();
        return view('pages.landing.produk.detail',compact('items','pages'));
        // dd($item);
    }
    public function show($slug){
        $pages='portofolio';
        $item=portofolio::with('label')->where('slug',$slug)->first();
        // dd($slug,$item);
        if($item==null){
            abort(404);
        }
        return view('pages.landing.portofolio.show',compact('item','pages'));
    }
    //produk
    public function produk(){
        $pages='produk';
        $items=produk::with('produkdetail')
        // ->with('transaksidetail')
        ->get();
        return view('pages.landing.produk.index',compact('items','pages'));
    }

    public function keranjang(){
        $pages='keranjang';
        $items=null;
        return view('pages.landing.produk.keranjang',compact('items','pages'));
    }

    public function jasa(){
        $pages='jasa';
        $items=ServiceRequest::all();
        return view('pages.landing.produk.jasa',compact('items','pages'));
    }
}
