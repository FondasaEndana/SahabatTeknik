<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pelangganController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='pelanggan';
        $items=pelanggan::with('users')
        ->orderBy('nama','asc')
        ->get();
        // dd($items);
        return view('pages.admin.pelanggan.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='pelanggan';
        return view('pages.admin.pelanggan.create',compact('pages'));
    }

    public function store(Request $request)
    {
        // dd($request);
            $request->validate([
                'nama'=>'required',
                // 'prefix'=>'required',
                // 'kode'=>'required',
            ],
            [
                'nama.required'=>'Nama harus diisi',
            ]);

            $users_id=DB::table('users')->insertGetId([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tipeuser' => 'pelanggan',
                'nomerinduk' => null,
                'username' => $request->username,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);

             DB::table('pelanggan')->insert([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'users_id' => $users_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);
    return redirect()->route('admin.pelanggan')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(pelanggan $item)
    {
        $pages='pelanggan';
        return view('pages.admin.pelanggan.edit',compact('pages','item'));
    }
    public function update(pelanggan $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
        ]);
        User::where('id',$item->users_id)
        ->update([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()
        ]);
            pelanggan::where('id',$item->id)
            ->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'updated_at' => Carbon::now()
            ]);



    return redirect()->route('admin.pelanggan')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(pelanggan $item){

        pelanggan::destroy($item->id);
        return redirect()->route('admin.pelanggan')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
