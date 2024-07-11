@extends('layouts.default')

@section('title')
Administrator
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
              <a href="{{route('admin.administrator.create')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
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
       <x-administrator.administrator-table :items="$items"></x-administrator.administrator-table>
    </div>

@endsection
