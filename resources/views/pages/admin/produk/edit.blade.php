@extends('layouts.default')

@section('title')
Produk
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}" />
@endif
@endpush

@section('content')
<x-jstooltip />

<h4 class="fw-bold py-3 mb-4">@yield('title')</h4>

<div class="card px-2">
  <div class="row">
    <div class="col-xl-6 mb-xl-0 mb-3">
      <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-produk="Toolbar with button groups">
        <div class="btn-group" role="group" aria-produk="Third group">
          <a href="{{route('admin.produk')}}" type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
            <i class="fa-solid fa-circle-arrow-left"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <hr class="my-1" />

  <x-produk.produk-form :item="$item"></x-produk.produk-form>
  <h4 class="fw-bold py-3 mb-4">Photo Produk</h4>
  <x-produk.produk-form-photo :item="$item"></x-produk.produk-form-photo>

  <x-produk.produk-photo-list :item="$item"></x-produk.produk-photo-list>

  <h4 class="fw-bold py-3 mb-4">Label / Kategori Produk</h4>
</div>


@endsection