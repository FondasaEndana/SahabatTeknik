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
            <div class="col-12 col-md-10 text-center mb-5 mb-lg-6">
                <h2 class="display-3 mb-4">Customers love it</h2>
                <p class="lead">This is some what i  made <br class="d-none d-lg-inline-block"> Some project is private and hidden repo / demo.</p>
            </div>
        </div>
        <div class="row mt-lg-6">
@forelse ($items as $item)
<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
@if($loop->index!=1)
    <div class="card border-light">
@else
    <div class="card border-light mt-lg-n6">
@endif
        <div class="card-body text-center py-5">
            <img class="image-sm img-fluid mx-auto mb-3" src="{{ asset('/') }}assets/template/swipe/assets/img/clients/elastic.svg" alt="Elastic brand">
            <h5  class="display-5 mb-4">{{$item->title}}</h5>
            <span class="d-block">
                @forelse ($item->label as $label)
                    <span class="star fas fa-tag text-info mr-2"> {{$label->nama}}</span>
                @empty
                @endforelse
            </span>
            <p class="px-2 my-4">{!!Str::limit($item->desc, 100, $end='...')!!}</p>
            <a href="{{route('portofolio.show',$item->slug)}}" class="btn btn-link text-black btn-outer-info">
                <span class="mr-2"><span class="fas fa-book-open"></span></span>
                <span class="font-weight-bold">Read more ...</span>
            </a>
        </div>
    </div>
</div>

@empty

@endforelse



        </div>
    </div>
</section>
@endsection
