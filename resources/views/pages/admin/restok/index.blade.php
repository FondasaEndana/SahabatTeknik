@extends('layouts.default')

@section('title')
Re-stok Produk
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
              <a href="{{route('admin.restok.create')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
                  <i class="fa-solid fa-circle-plus"></i>
              </a>
            </div>
              {{-- <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF">
                    <i class="fa-solid fa-file-pdf"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="tooltip" data-bs-placement="top" title="Export">
                    <i class="fa-solid fa-download"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Import">
                    <i class="fa-solid fa-upload"></i>
                </button>
              </div> --}}
            </div>
          </div>
        </div>
    </div>
    <div class="card">
       <x-restok.restok-table :items="$items"></x-restok.restok-table>
    </div>

@endsection

@section('containermodal')

<!-- Modal -->
<div class="modal fade" id="modalDetailTransaksi" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModalLabel">Detail</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
@endsection
