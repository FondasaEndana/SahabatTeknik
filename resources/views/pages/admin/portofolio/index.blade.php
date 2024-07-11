@extends('layouts.default')

@section('title')
Portofolio
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
              <a href="{{route('admin.portofolio.create')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
                  <i class="fa-solid fa-circle-plus"></i>
              </a>
            </div>
              <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF">
                    <i class="fa-solid fa-file-pdf"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="tooltip" data-bs-placement="top" title="Export">
                    <i class="fa-solid fa-download"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Import">
                    <i class="fa-solid fa-upload"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Basic Bootstrap Table -->
    <div class="card">
      {{-- <h5 class="card-header">Table Basic</h5> --}}


      <div class="table-responsive px-2 py-2">
        <table id="datatable" class="table table-striped table-bordered table-md">
          <thead>
            <tr>
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th>Title</th>
              <th>Content</th>
              <th class="text-center">Label</th>
              <th class="babeng-min-row text-center">Link</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($items as $item)
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="fa-solid fa-angles-right"></i></button>
                    <x-btnedit link="{{route('admin.portofolio.edit',$item->id)}}"></x-btnedit>
                    <x-btndelete link="{{route('admin.portofolio.destroy',$item->id)}}"></x-btndelete>
                </td>
                <td>{!!Str::limit($item->desc, 100, $end='...')!!}</td>
                <td>{{Str::limit($item->title, 20, $end='...')}}</td>
                <td class="babeng-min-row text-center">
                    @forelse ($item->label as $label)
                        <button class="btn btn-sm btn-primary">{{$label->nama}}</button>
                    @empty

                    @endforelse
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Github"><i class="fab fa-github"></i></button>
                    <button class="btn btn-sm btn-dark mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Demo"><i class="fas fa-globe"></i></button>
                </td>
            </tr>
            @empty
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />

@endsection
