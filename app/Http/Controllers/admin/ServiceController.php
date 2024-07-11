<?php

namespace App\Http\Controllers\admin;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $pages = 'jasa';
        $items = ServiceRequest::all();
        return view('pages.admin.jasa.index', compact('items', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'service_type' => 'required',
            'description' => 'required',
        ]);

        ServiceRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_type' => $request->service_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.jasa')->with('status', 'Data berhasil ditambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function create()
    {
        $pages = 'jasa';
        return view('pages.admin.jasa.create', compact('pages'));
    }

    public function edit(ServiceRequest $item)
    {
        $pages = 'jasa';
        return view('pages.admin.jasa.edit', compact('item', 'pages'));
    }

    public function update(Request $request, ServiceRequest $item)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'service_type' => 'required',
            'description' => 'required',
        ]);
    
        // Gunakan metode update pada model
        $item->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_type' => $request->service_type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.jasa')->with('status', 'Data berhasil diupdate!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }

    public function destroy(ServiceRequest $item)
    {
        $item->delete();
        return redirect()->route('admin.jasa')->with('status', 'Data berhasil dihapus!')->with('tipe', 'warning')->with('icon', 'fas fa-feather');
    }
}
