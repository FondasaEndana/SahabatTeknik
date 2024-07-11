<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\label;
use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class portofolioController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()){
                if(Auth::user()->tipeuser!='admin'){
                    return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
                }
            }else{
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }

        return $next($request);

        });
    }
    public function index(){
        $pages='portofolio';
        $items=portofolio::with('label')->get();
        return view('pages.admin.portofolio.index',compact('items','pages'));
    }
    public function create()
    {
        $pages='portofolio';
        $kategori=kategori::where('prefix','label')->get();
        return view('pages.admin.portofolio.create',compact('pages','kategori'));
    }

    public function store(Request $request)
    {
        $slug=Str::slug($request->title, '-');
        // dd($request,$slug);
            $request->validate([
                'title'=>'required|unique:portofolio',
                'desc'=>'required',
                'kategori'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);

            $portofolio_id=DB::table('portofolio')->insertGetId(
                array(
                       'title'     =>   $request->title,
                       'desc'     =>   $request->desc,
                       'tahun'     =>   date('Y'),
                       'github'     =>  null,
                       'demo'     =>  null,
                       'slug'     =>   $slug,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
            $z=count($request->kategori);
            for($i=0;$i<$z;$i++){
            $getkategori=kategori::where('id',$request->kategori[$i])->first();
            // dd($request->kategori[1],$getkategori->nama);
            DB::table('label')->insert(
                array(
                       'nama'     =>   $getkategori->nama,
                       'prefix'     =>   'portofolio',
                       'parrent_id'     =>   $portofolio_id,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
            }

    return redirect()->route('admin.portofolio')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(portofolio $item)
    {
        $pages='portofolio';
        $kategori=kategori::where('prefix','label')->get();
        return view('pages.admin.portofolio.edit',compact('pages','item','kategori'));
    }
    public function update(portofolio $item,Request $request)
    {

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'kategori'=>'required',
        ],
        [
            'title.required'=>'nama harus diisi',
            'desc'=>'required',
            'kategori'=>'required',
        ]);

            portofolio::where('id',$item->id)
            ->update([
                'title'     =>   $request->title,
                'desc'     =>   $request->desc,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);

            label::where('parrent_id', $item->id)->forceDelete();
            $z=count($request->kategori);
            for($i=0;$i<$z;$i++){
            $getkategori=kategori::where('id',$request->kategori[$i])->first();
            // dd($request->kategori[1],$getkategori->nama);
            DB::table('label')->insert(
                array(
                       'nama'     =>   $getkategori->nama,
                       'prefix'     =>   'portofolio',
                       'parrent_id'     =>   $item->id,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
            }


    return redirect()->route('admin.portofolio')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(portofolio $item){

        portofolio::destroy($item->id);
        return redirect()->route('admin.portofolio')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
