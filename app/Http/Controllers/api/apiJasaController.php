<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;

class ApiJasaController extends Controller
{
    public function jasa(Request $request){
        $bln = $request->blnthn ? date('m', strtotime($request->blnthn)) : date('m');
        $thn = $request->blnthn ? date('Y', strtotime($request->blnthn)) : date('Y');
        
        $datas = ServiceRequest::whereMonth('created_at', $bln)
            ->whereYear('created_at', $thn)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $items = [];
        foreach ($datas as $data) {
            $arr = null;
            $arr['id'] = $data->id;
            $arr['name'] = $data->name;
            $arr['email'] = $data->email;
            $arr['phone'] = $data->phone;
            $arr['service_type'] = $data->service_type;
            $arr['description'] = $data->description;
            $arr['price'] = $data->price;
            $arr['created_at'] = $data->created_at->format('Y-m-d');
            $items[] = $arr;
        }
        
        return response()->json([
            'success' => true,
            'data' => $items,
        ], 200);
    }

    public function jasaDetail(Request $request, $id)
    {
        $data = ServiceRequest::find($id);
        
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }
}


