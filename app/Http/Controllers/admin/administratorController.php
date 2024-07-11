<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class administratorController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='administrator';
        $items=User::Where('tipeuser','<>','pelanggan')->orderBy('name','asc')
        ->get();
        return view('pages.admin.administrator.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='administrator';
        return view('pages.admin.administrator.create',compact('pages'));
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
                'tipeuser' => $request->tipeuser,
                'nomerinduk' => null,
                'username' => $request->username,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
             ]);

    return redirect()->route('admin.administrator')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(User $item)
    {
        $pages='administrator';
        return view('pages.admin.administrator.edit',compact('pages','item'));
    }
    public function update(User $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
        ]);
        User::where('id',$item->id)
        ->update([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipeuser' => $request->tipeuser,
            'updated_at' => Carbon::now()
        ]);



    return redirect()->route('admin.administrator')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(User $item){

        User::destroy($item->id);
        return redirect()->route('admin.administrator')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
