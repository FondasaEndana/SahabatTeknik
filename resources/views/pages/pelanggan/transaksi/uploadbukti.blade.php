@extends('layouts.default')

@section('title')
Upload bukti Pembayaran
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<x-jstooltip/>
@if($items->count()>0)
    <x-jsdatatable/>
@endif
    <h4 class="fw-bold py-3 mb-4">@yield('title')</h4>
    <div class="card px-2">
        <div class="row">
          <div class="col-xl-6 mb-xl-0 mb-3">
            <div
              class="btn-toolbar demo-inline-spacing"
              role="toolbar"
              aria-label="Toolbar with button groups"
            >
            <div class="btn-group" role="group" aria-label="Third group">
                <a href="{{route('pelanggan.transaksi')}}" type="button" class="btn btn-secondary mr-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
                <i class="fa-solid fa-circle-arrow-left"></i>
            </a>
            </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card">
        <x-transaksi.transaksi-form-bukti item="{{$items->kodetrans}}"></x-transaksi.transaksi-form-bukti>
    </div>


    <h4 class="fw-bold py-3 mb-4">Cara melakukan Pembayaran dan Konfirmasi</h4>
    <div class="card px-2 py-2" >
        <div class="px-2">
            <p class="mt-3">1. Tranfer ke Rekening <b> {{Fungsi::bank_nama()}} {{Fungsi::bank_rekening()}} </b> sejumlah <b>{{Fungsi::rupiah($items->totalbayar)}}</b> </p>
            <p>2. Foto / Screenshot bukti pembayaran kemudian upload pada menu ini. </p>
            <p>3. Tunggu konfirmasi dari admin dalam 1x24 jam jika belum ada perubahan kontak admin.</p></div>
    </div>

@endsection

@section('containermodal')
@endsection
