<div>
    <form id="setting-form" method="POST" action="{{$item?route('admin.label.update',$item->id):route('admin.label.store')}}">
    @php
    //declare var
        $nama='';
        $kode='';
    @endphp
        @if($item)
        @method('put')
    @php
    //init while items>0
        $nama=$item->nama;
        $kode=$item->kode;
    @endphp
        @endif
        @csrf
    <div class="row py-2 px-2">
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required  value="{{old('nama')?old('nama'):$nama}}">

              @error('nama')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kode </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('kode') is-invalid @enderror" name="kode" required  value="{{old('kode')?old('kode'):$kode}}">

                  @error('kode')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>

              <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
              </div>
      </div>
      </form>

</div>