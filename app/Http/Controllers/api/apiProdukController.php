<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Produk;
use App\Models\ProdukDetail;
use App\Models\TransaksiDetail;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class apiProdukController extends Controller
{
    public function cari(Request $request)
    {
        $datas = Produk::where('nama', 'like', '%' . $request->cari . '%')->get();
        $items = [];
        $img = 'https://ui-avatars.com/api/?name=00&color=7F9CF5&background=EBF4FF';

        foreach ($datas as $data) {
            $getImages = Image::where('prefix', 'produk')
                ->where('parrent_id', $data->id)
                ->first();
            if ($getImages != null) {
                $img = asset('/') . $getImages->photo;
            } else {
                $img = 'https://ui-avatars.com/api/?name=' . $data->nama . '&color=7F9CF5&background=EBF4FF';
            }

            $getstok = ProdukDetail::where('produk_id', $data->id)->sum('jml');
            $getterjual = TransaksiDetail::where('produk_id', $data->id)
                ->whereHas('transaksi', function ($query) {
                    $query->where('status', '<>', 'cancel');
                })
                ->sum('jml');
            $getstoktersedia = $getstok - $getterjual;

            $items[] = [
                'id' => $data->id,
                'nama' => $data->nama,
                'berat' => $data->berat,
                'slug' => $data->slug,
                'harga_jual' => $data->harga_jual,
                'stok' => $getstok,
                'terjual' => $getterjual,
                'stoktersedia' => $getstoktersedia,
                'img' => $img,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $items,
        ]);
    }

    public function restokdetail($item, Request $request)
    {
        $items = ProdukDetail::with('produk')->where('restok_id', $item)->get();
        return response()->json([
            'success' => true,
            'data' => $items,
        ], 200);
    }

    public function jasadetail($id, Request $request)
    {
        try {
            $serviceRequest = ServiceRequest::find($id);

            if (!$serviceRequest) {
                return response()->json(['message' => 'Service Request not found'], 404);
            }

            return response()->json(['data' => $serviceRequest]);
        } catch (\Exception $e) {
            \Log::error('Error in jasadetail method: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function periksausername(Request $request)
    {
        $items = 0;
        if ($request->username) {
            $items = User::where('username', $request->username)->count();
        }
        if ($request->email) {
            $items = User::where('email', $request->email)->count();
        }

        return response()->json([
            'success' => true,
            'data' => $items,
        ], 200);
    }
}
