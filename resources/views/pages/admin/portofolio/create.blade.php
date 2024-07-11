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
              <a href="{{route('admin.portofolio')}}" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
                <i class="fa-solid fa-circle-arrow-left"></i>
              </a>
            </div>
            </div>
          </div>
        </div>

    <hr class="my-1" />

    <form id="setting-form" method="POST" action="{{route('admin.portofolio.store')}}">
        @csrf
    <div class="row py-2 px-2">

        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Title </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" required  value="{{old('title')}}">

              @error('title')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>
          @push('after-style')
          <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
          @endpush
          @push('before-script')
          <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
            console.error( error );
            } );
            </script>
          @endpush
          <div class="form-group row align-items-center py-2">
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">Content </label>
              <div class="col-sm-6 col-md-9">

                <textarea name="desc"
                id="editor"
                class="form-control"
                placeholder="Content"
                aria-label="Content"
                aria-describedby="basic-icon-default-message2"
                rows="10"
                style=" min-width:500px; max-width:100%;min-height:50px;height:100%;width:100%;"
              >{{old('desc')}}</textarea>

                @error('prefix')<div class="invalid-feedback"> {{$message}}</div>
                @enderror

              </div>
            </div>

            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Label</label>
                <div class="col-sm-6 col-md-9">

                    <select class="js-example-basic-single form-control-sm @error('kategori')
                        is-invalid
                    @enderror" name="kategori[]"  style="width: 100%" multiple="multiple" required>
                        <option disabled value=""> Pilih Label</option>
                        @foreach ($kategori as $t)
                            <option value="{{ $t->id }}"> {{ $t->nama }}</option>
                        @endforeach
                      </select>

                  @error('kategori')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>

              <script type="text/javascript">
                $(document).ready(function() {
                    // In your Javascript (external .js resource or <script> tag)
                        $(document).ready(function() {
                            $('.js-example-basic-single').select2({
                                theme: "classic",
                                // allowClear: true,
                                width: "resolve"
                            });
                        });
                });
               </script>

              <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
              </div>
    </div>
    </div>


@endsection
