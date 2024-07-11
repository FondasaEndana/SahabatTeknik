<div>
    <form id="setting-form" method="POST" action="{{route('admin.restok.store')}}">
    @php
    //declare var
        $namatoko='';
        $tglbeli=date('Y-m-d');
        $penanggungjawab='';
    @endphp
        @csrf
    <div class="row py-2 px-2">
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Nama Toko</label>
            <div class="col-sm-4 col-md-7">

                <input type="hidden" class="form-control  @error('cart') is-invalid @enderror" id="cart" name="cart"  >

                <input type="hidden" class="form-control  @error('kodetrans') is-invalid @enderror" id="kodetrans" name="kodetrans" value="{{$kodetrans}}" >

              <input type="text" class="form-control  @error('namatoko') is-invalid @enderror" name="namatoko" required  value="{{old('namatoko')?old('namatoko'):$namatoko}}">

              @error('namatoko')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Tanggal Pembelian</label>
            <div class="col-sm-4 col-md-7">

              <input type="date" class="form-control  @error('tglbeli') is-invalid @enderror" name="tglbeli" required  value="{{old('tglbeli')?old('tglbeli'):$tglbeli}}">

              @error('tglbeli')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Tagihan</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('totalbayar') is-invalid @enderror" name="totalbayar"  readonly id="totalbayar" value="0">

              @error('totalbayar')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Penanggung Jawab</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('penanggungjawab') is-invalid @enderror" name="penanggungjawab" required  value="{{old('penanggungjawab')?old('penanggungjawab'):$penanggungjawab}}">

              @error('penanggungjawab')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

              <div class="card-footer d-flex justify-end ">
                <span class="btn btn-danger ml-2" id="save-reset" onclick="return confirm('Anda yakin melakukan reset ? Y/N') ?resetData():''">Reset</span>
                <button class="btn btn-success ml-2" id="save-save" onclick="return confirm('Anda yakin data telah sesuai? Y/N')">Simpan</button>
              </div>
      </div>
      </form>

</div>

