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
<div class="section bg-soft" id="download">
    <figure class="position-absolute top-0 left-0 w-100 d-none d-md-block mt-n3">
        <svg class="fill-soft" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 43.4" style="enable-background:new 0 0 1920 43.4;" xml:space="preserve">
           <path d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
        </svg>
    </figure>
    <div class="container">
        <div class="row row-grid align-items-center">
            <div class="col-12 col-lg-6">
                <span class="h5 text-muted mb-2 d-block">Project title</span>
                <h2 class="display-3 mb-4">{{$item->title}}</h2>
                <p class="lead text-muted">{!!$item->desc!!}. </p>

            <span class="d-block">
                @forelse ($item->label as $label)
                    <span class="star fas fa-tag text-info mr-2"> {{$label->nama}}</span>
                @empty
                @endforelse
            </span>
                <div class="mt-4 mt-lg-5">
                    <a href="#" class="btn btn-dark btn-download-app mb-xl-0 mr-2 mr-md-3">
                        <span class="d-flex align-items-center">
                            <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-github"></span></span>
                            <span class="d-inline-block text-left">
                                <small class="font-weight-normal d-none d-md-block"></small> Github
                            </span>
                        </span>
                    </a>
                    <a href="#" class="btn btn-dark btn-download-app">
                        <span class="d-flex align-items-center">
                            <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                            <span class="d-inline-block text-left">
                                <small class="font-weight-normal d-none d-md-block"> </small> Demo
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-5 ml-lg-auto">
                <img class="d-none d-lg-inline-block" src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene-3.svg" alt="Mobile App Illustration">
            </div>
        </div>
    </div>
</div>
@endsection
