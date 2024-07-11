<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class labelController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='label';
        $items=kategori::where('prefix','label')->orderBy('prefix','desc')
        ->orderBy('nama','asc')
        ->paginate();
        return view('pages.admin.label.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='label';
        return view('pages.admin.label.create',compact('pages'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'=>'required',
                // 'prefix'=>'required',
                'kode'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);
            DB::table('kategori')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'prefix'     =>   'label',
                       'kode'     =>   $request->kode,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('admin.label')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(kategori $item)
    {
        $pages='label';
        return view('pages.admin.label.edit',compact('pages','item'));
    }
    public function update(kategori $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
            // 'prefix'=>'required',
            'kode'=>'required',
        ]);

            kategori::where('id',$item->id)
            ->update([
                'nama'     =>   $request->nama,
                'prefix'     =>   'label',
                'kode'     =>   $request->kode,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);


    return redirect()->route('admin.label')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(kategori $item){

        kategori::destroy($item->id);
        return redirect()->route('admin.label')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
