<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;

class apiKategoriController extends Controller
{
    public function label(){
        $items=kategori::get();
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);
    }
}
