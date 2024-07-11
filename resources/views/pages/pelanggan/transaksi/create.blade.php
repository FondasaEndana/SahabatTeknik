@extends('layouts.default')

@section('title')
Buat Transaksi
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
            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{route('pelanggan.transaksi')}}" type="button" class="btn btn-secondary mr-2"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </a>
                    <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Add Produk"
                        data-bs-toggle="modal" data-bs-target="#formModal">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>


            </div>
        </div>
    </div>

    <hr class="my-2" />
    <div class=card>
        <h4>Kode Transaksi : {{ $kodetrans}}</h4>
    </div>

    <hr class="my-1" />
    <div class="row">
        <div class="col-md-8 col-12">
            <x-transaksi.transaksi-form-pelanggan item=""></x-transaksi.transaksi-form-pelanggan>
        </div>

        <div class="col-md-4 col-12">
            {{-- {{dd($getPelanggan)}} --}}
            <x-transaksi.transaksi-form-two-pelanggan kodetrans="{{$kodetrans}}" :pelanggan="$pelanggan" :getPelanggan="$getPelanggan"></x-transaksi.transaksi-form-two-pelanggan>
        </div>
    </div>
</div>
@endsection

@section('containermodal')

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="formModalLabel">Modal title</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
@push('before-script')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/transaksiPelanggan.js')}}"></script>
<script>
    $(document).ready(function () {


      //proses Modal Store
        let contentResponse = '';
        $('#formModal').on('shown.bs.modal', function () {
            storeCariData('',"{{route('api.produk.cari')}}");
            $('#inputCari').focus();
        });
        $('#inputCari').keyup(function () {

            // console.log($(this).val());
            storeCariData($(this).val(),"{{route('api.produk.cari')}}");
        });



    });
    </script>
@endpush

                <div class="card mb-2">
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required
                        value="" placeholder="Cari ... " id="inputCari">
                </div>

                <div class="row" id="contentCari">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModalEdit" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
