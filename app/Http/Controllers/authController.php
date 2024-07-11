<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class authController extends Controller
{
    public function daftar(){
        return view('auth.daftar');
    }
    public function store(Request $request){
        
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'jk' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'tipeuser' => 'pelanggan',
            'nomerinduk' => null,
            'password' => Hash::make($request->password),
        ]);
        // dd($user);

        // $users_id=DB::table('users')->insertGetId([
        //     'name' => $request->nama,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'tipeuser' => 'pelanggan',
        //     'nomerinduk' => null,
        //     'username' => $request->username,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        //  ]);


        DB::table('pelanggan')->insert([
            'nama' => $request->name,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'users_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
