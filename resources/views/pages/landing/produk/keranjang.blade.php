@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<section class="section section-lg pb-0" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            @if(!Auth::user())
            <div class="alert alert-warning" role="alert">
               Anda harus Login Untuk menambah ke keranjang dan melakukan checkout !
              </div>
              @endif
            <div class="col-12 col-md-10 text-center mb-0 mb-lg-0">
                <h2 class="display-3 mb-4">Keranjang</h2><!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Launch demo modal
                </button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
                {{-- <p class="lead">This is some what i  made <br class="d-none d-lg-inline-block"> Some project is private and hidden repo / demo.</p> --}}
            </div>
        </div>

@push('before-script')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/landingProduk.js')}}"></script>
<script>
    $(document).ready(function () {


    });
    </script>
@endpush
<div class="row " id="contentKeranjang">
    {{-- <x-jsdatatable/> --}}
    <x-babeng.table-one>
        <x-slot name="thead">
            <th class="babeng-min-row text-center">No</th>
            <th class="text-center">Aksi</th>
            <th>Nama</th>
            <th>Harga Produk</th>
            <th class="text-center babeng-min-row">Berat</th>
            <th class="text-center babeng-min-row">Jumlah</th>
            <th class="text-center">Total Harga</th>
      </x-slot>
      <x-slot name="tbody">
        @push('before-script')
        <script>
$(function () {
refreshDataRestok();
});
</script>
@endpush
<tbody class="table-border-bottom-0" id="trbody">
</tbody>
</x-slot>
    </x-babeng.table-one>
</div>

<div class="row justify-content-center">
    <div class="modal-footer">
      <span class="btn btn-danger ml-2" id="save-reset" onclick="return confirm('Anda yakin melakukan reset ? Y/N') ?resetData():''">Reset</span>
        <a href="{{route('pelanggan.transaksi.create')}}" class="btn btn-lg btn-warning">Checkout</a>

    </div>
</div>
</div>
</section>
@endsection

@section('containermodal')

<!-- Modal -->
<div class="modal fade" id="formModalEdit" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit</h5>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
            <div class="modal-body">


                <div class="form-group row align-items-center py-2">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Produk</label>
                    <div class="col-sm-6 col-md-9">

                      <input type="text" class="form-control "  readonly id="inputNamaProduk">

                      @error('namatoko')<div class="invalid-feedback"> {{$message}}</div>
                      @enderror

                    </div>
                  </div>





                <div class="form-group row align-items-center py-2">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right ">Harga </label>
                    <div class="col-sm-6 col-md-9">

                      <input type="text" class="form-control "  id="inputTerjual" readonly>

                      @error('namatoko')<div class="invalid-feedback"> {{$message}}</div>
                      @enderror

                    </div>
                  </div>

                  <div class="form-group row align-items-center py-2">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right ">Stok </label>
                    <div class="col-sm-6 col-md-9">

                      <input type="text" class="form-control "  id="inputStokTersedia" readonly>

                      @error('namatoko')<div class="invalid-feedback"> {{$message}}</div>
                      @enderror

                    </div>
                  </div>


                <div class="form-group row align-items-center py-2">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right ">Jumlah</label>
                    <div class="col-sm-6 col-md-9">

                      <input type="number" class="form-control" id="inputJumlah" min="0" max="0" >

                    <div class="invalid-feedback">Stok tidak cukup!</div>


                    </div>
                  </div>


            </div>
            <div class="modal-footer" id="btnApplyModalEdit">

            </div>
        </div>
    </div>
</div>

@endsection
