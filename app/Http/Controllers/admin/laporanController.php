<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\restok;
use App\Models\transaksi;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function restok(Request $request)
    {
        #WAJIB
        $pages = 'laporanrestok';
        $items = restok::orderBy('tglbeli', 'desc')
            ->with('produkdetail')
            ->WhereMonth('tglbeli', date('m'))
            ->WhereYear('tglbeli', date('Y'))
            ->orderBy('id', 'desc')
            ->get();
        // dd($items);
        return view('pages.admin.laporan.restok', compact('items', 'request', 'pages'));
    }

    public function penjualan(Request $request)
    {
        #WAJIB
        $pages = 'laporanpenjualan';
        $items = transaksi::orderBy('tglbeli', 'desc')
            ->with('transaksidetail')
            ->orderBy('id', 'desc')
            ->WhereMonth('tglbeli', date('m'))
            ->WhereYear('tglbeli', date('Y'))
            ->get();
        return view('pages.admin.laporan.penjualan', compact('items', 'request', 'pages'));
    }
    public function laba(Request $request)
    {
        $date = date('Y-m');
        if ($request->has('tgl')) {
            $date = $request->tgl;
        }
        // dd($date);
        $tgl = $date;

        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
        #WAJIB
        $pages = 'laporanlaba';
        $items = transaksi::orderBy('tglbeli', 'desc')
            ->with('transaksidetail')
            ->where('status', 'success')
            ->orderBy('id', 'desc')
            ->WhereMonth('tglbeli', $month)
            ->WhereYear('tglbeli', $year)
            ->get();
        return view('pages.admin.laporan.laba', compact('items', 'request', 'pages', 'tgl'));
    }
}
