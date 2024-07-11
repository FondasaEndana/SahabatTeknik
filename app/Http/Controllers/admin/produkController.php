<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\image;
use App\Models\label;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages = 'produk';
        $items = produk::orderBy('nama', 'asc')
            ->paginate();
        return view('pages.admin.produk.index', compact('items', 'request', 'pages'));
    }
    public function create()
    {
        $pages = 'produk';
        return view('pages.admin.produk.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'harga_jual' => 'required',
                'desc' => 'required',
                'satuan' => 'required',
                'label' => 'required',
            ],
            [
                'nama.nama' => 'Nama harus diisi',
            ]
        );
        $slug = Str::slug($request->nama, '-');
        $item_id = DB::table('produk')->insertGetId(
            array(
                'nama'     =>   $request->nama,
                'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                'desc'     =>   $request->desc,
                'slug'     =>   $slug,
                'satuan'     =>   $request->satuan,
                'berat'     =>   $request->berat,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );


        $label = $request->label;

        $label = collect($label);

        foreach ($label as $d) {
            label::firstOrCreate([
                'parrent_id' => $item_id,
                'prefix' => 'produk',
                'nama' => $d,
            ]);
        }

        return redirect()->route('admin.produk')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function edit(produk $item)
    {
        $pages = 'produk';
        return view('pages.admin.produk.edit', compact('pages', 'item'));
    }
    public function update(produk $item, Request $request)
    {
        // dd($request->label);
        $request->validate(
            [
                'nama' => 'required',
                'harga_jual' => 'required',
                'desc' => 'required',
                'label' => 'required',
            ],
            [
                'nama.required' => 'nama harus diisi',
                // 'prefix'=>'required',
                'kode' => 'required',
            ]
        );

        $slug = Str::slug($request->nama, '-');
        produk::where('id', $item->id)
            ->update([
                'nama'     =>   $request->nama,
                'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                'desc'     =>   $request->desc,
                'satuan'     =>   $request->satuan,
                'berat'     =>   $request->berat,
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        $labelold = label::where('parrent_id', $item->id)->where('prefix', 'produk')->pluck('nama');

        $label = $request->label;

        $label = collect($label);

        $create = $label->diff($labelold);
        //diff yang perlu dihapus
        $create->all();

        $remove = $labelold->diff($label);
        //diff yang perlu dihapus
        $remove->all();


        //insert label baru
        foreach ($create as $d) {
            label::firstOrCreate([
                'parrent_id' => $item->id,
                'prefix' => 'produk',
                'nama' => $d,
            ]);
        }

        //hapus label yang tidak digunakan
        foreach ($remove as $d) {
            label::where('nama', $d)->where('prefix', 'produk')->where('parrent_id', $item->id)->delete();
        }
        // dd(count($labelold),$labelold,$label,$create,$remove);

        return redirect()->route('admin.produk')->with('status', 'Data berhasil diubah!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function destroy(produk $item)
    {

        produk::destroy($item->id);
        return redirect()->route('admin.produk')->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }

    public function uploadphoto(produk $item, Request $request)
    {
        // dd($request,$item);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $imageName = time() . '.' . $request->photo->extension();

        // $periksa=image::where('parrent_id',$item->id)->count();
        // if($periksa>0){
        //     $hapus=image::where('parrent_id',$item->id)->get();
        //     foreach($hapus as $item){
        //         $path=public_path($item->photo);
        //         if(file_exists($path)){
        //             unlink($path);
        //         }
        //         $item->delete();
        //     }
        // }
        $data_id = DB::table('image')->insertGetId(
            array(
                'nama'     =>   $imageName,
                'prefix'     =>   'produk',
                'parrent_id'     =>   $item->id,
                'desc'     =>   'Photo Produk',
                'photo'     =>   'images/produk/' . $imageName,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        $request->photo->move(public_path('images/produk'), $imageName);



        return redirect()->route('admin.produk')->with('status', 'Photo berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
    public function photodestroy(image $item, Request $request)
    {
        image::destroy($item->id);
        // dd($item);
        $path = public_path($item->photo);
        if (file_exists($path)) {
            unlink($path);
        }
        $item->delete();
        image::destroy($item->id);
        return redirect()->route('admin.produk')->with('status', 'Data berhasil dihapus!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
        // dd($item);
    }
}
