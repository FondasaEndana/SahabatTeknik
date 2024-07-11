@extends('layouts.default')

@section('title')
Transaksi
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
              <a href="{{route('pelanggan.transaksi.create')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
                  <i class="fa-solid fa-circle-plus"></i>
              </a>
            </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card">
      <x-transaksi.transaksi-table :items="$items" />
    </div>

@endsection

@section('containermodal')
<!-- Modal -->
<div class="modal fade" id="modalDetailTransaksi" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModalLabel">Detail Transaksi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <div class="modal-footer" id="divModalTransaksiDetail">
              Tes
          </div>

    <x-babeng.table-two>
      <x-slot name="thead">
            <th class="babeng-min-row text-center">No</th>
            <th>Nama</th>
            <th>Harga Beli</th>
            <th class="text-center babeng-min-row">Jumlah</th>
            <th class="text-center">Total Harga</th>
      </x-slot>
      <x-slot name="tbody">
      <tbody class="table-border-bottom-0" id="trbody">
      </tbody>
      </x-slot>
  </x-babeng.table-two>
          </div>
          <div class="modal-footer" id="divModalDetail">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-info" data-bs-dismiss="modal">Tunggu Konfirmasi </button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Konfirmasi Pembelian</button> --}}
          </div>
      </div>
  </div>
</div>
@endsection
