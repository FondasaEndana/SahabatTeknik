@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')
<script>
// Example of JavaScript code
function storeProduk(id, name, price, stock, min, max, weight) {
    // Make sure the function syntax is correct
    console.log(id, name, price, stock, min, max, weight);
    // Your logic here
}

document.addEventListener('DOMContentLoaded', (event) => {
    // Add event listeners or any initial script execution
});

<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/landingProduk.js')}}"></script>
@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<section class="section section-lg pb-0" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center mb-4 mb-lg-4">
                {{-- <h2 class="display-3 mb-4">{{$items->nama}}</h2> --}}
                {{-- <p class="lead">This is some what i  made <br class="d-none d-lg-inline-block"> Some project is private and hidden repo / demo.</p> --}}
            </div>
        </div>

@push('before-script')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/landingProduk.js')}}"></script>
@endpush
<div class="row justify-content-center bg-light bg-gradient" >
    <div class=" col-6 text-center mb-4 mb-lg-4 ">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner mt-0 mb-0">
                @php

$img='https://ui-avatars.com/api/?name='.$items->nama.'&color=FFFFFF&background=000000';
            $getImages=\App\Models\image::where('prefix','produk')
            ->where('parrent_id',$items->id)
            ->get();
                $no=0;
                @endphp
                @forelse ($getImages as $photo)
                @php
            if($getImages!=null){
                $img=asset('/').$photo->photo;
            }else{
                $img='https://ui-avatars.com/api/?name='.$items->nama.'&color=7F9CF5&background=EBF4FF';
            }
            $no++;
                @endphp
              <div class="carousel-item {{$no<2?'active':''}}">
                <img src="{{$img}}" class="d-block w-100 card border-1" alt="gambar"  style="display: block;max-width: 100%;height: 500px;object-fit: cover">
              </div>

                @empty
                <div class="carousel-item active">
                  <img src="{{$img}}" class="d-block w-100 card border-1" alt="gambar"  style="display: block;max-width: 100%;height: 500px;object-fit: cover">
                </div>

                @endforelse


            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

    </div>

    @php
    $getstok=\App\Models\produkdetail::where('produk_id',$items->id)->sum('jml');
    $getterjual=\App\Models\transaksidetail::where('produk_id',$items->id)->whereHas('transaksi', function ($query) {
        $query->where('status', '<>', 'cancel');
    })->sum('jml');
    $stoktersedia=$getstok-$getterjual;
@endphp
    <div class=" col-6 text-left mb-4 mb-lg-4">
        <div class="mt-5 mb-5 justify-start">
            <h3 class="mb-4"> {{$items->nama}}</h3>
            <h4 class="mb-4 ">Harga : {{Fungsi::rupiah($items->harga_jual)}}
                {{-- /1 {{$items->satuan}} --}}
            </h4>
            <h5 class="mb-4">Stok : {{$stoktersedia}}
                {{-- {{$items->satuan}} --}}
            </h5>
            <h5 class="mb-4">Berat : {{$items->berat}} gram
            </h5>
            <p class="mb-5">{!!$items->desc!!}.</p>
            @php
                $labels = \App\Models\label::where('parrent_id',$items->id)->where('prefix','produk')->get();
                // dd($labels);
            @endphp
            @forelse ($labels as $label)
            <span class="badge bg-info ml-1 mr-1"> #{{$label->nama}} </span>

            @empty

            @endforelse
            <div class="text-right mt-5">
                <button class="btn btn-success"  onclick="storeProduk({{$items->id}},'{{$items->nama}}',{{$items->harga_jual}},{{$stoktersedia}},0,0,{{ $items->berat }})"> Tambahkan ke keranjang </button>
            </div>
        </div>

    </div>

</div>


</div>
</section>

@endsection
