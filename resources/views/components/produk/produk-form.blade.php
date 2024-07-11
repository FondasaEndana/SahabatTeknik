<div>
    <form id="setting-form" method="POST" action="{{$item?route('admin.produk.update',$item->id):route('admin.produk.store')}}">
    @php
    //declare var
        $nama='';
        $harga_jual='';
        $desc='';
        $satuan='';
    @endphp
        @if($item)
        @method('put')
    @php
    //init while items>0
        $nama=$item->nama;
        $harga_jual=$item->harga_jual;
        $desc=$item->desc;
        $satuan=$item->satuan;
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
                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Harga Jual </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('harga_jual') is-invalid @enderror" name="harga_jual" required  value="{{old('harga_jual')?old('harga_jual'):$harga_jual}}" id="harga_jual">

                  @error('kode')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>

                        @push('before-script')
                        <script>
                            $(function () {
                                let harga_jual = document.getElementById('harga_jual');
                                harga_jual.addEventListener('keyup', function(e){
                                    harga_jual.value = babengRupiah(this.value, 'Rp. ');
                                });
                            });
                        </script>
                        <script src="{{asset('/assets/js/babeng.js')}}"></script>
                    @endpush


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
              <label for="site-title" class="form-control-label col-sm-3 text-md-right">Deskripsi </label>
              <div class="col-sm-6 col-md-9">

                <textarea name="desc"
                id="editor"
                class="form-control"
                placeholder="Content"
                aria-label="Content"
                aria-describedby="basic-icon-default-message2"
                rows="10"
                style=" min-width:500px; max-width:100%;min-height:50px;height:100%;width:100%;"
              >{{old('desc')?old('desc'):$desc}}</textarea>

                @error('prefix')<div class="invalid-feedback"> {{$message}}</div>
                @enderror

              </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Berat *) <i>Dalam gram</i> </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('berat') is-invalid @enderror" placeholder="dalam gram" name="berat" required  value="{{old('berat')?old('berat'):200}}">

                  @error('berat')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>
              <div class="form-group row align-items-center py-2">
                  <label for="site-title" class="form-control-label col-sm-3 text-md-right">Satuan </label>
                  <div class="col-sm-6 col-md-9">

                    <input type="text" class="form-control  @error('satuan') is-invalid @enderror" placeholder="Kg/Biji/Meter/dll" name="satuan" required  value="{{old('satuan')?old('satuan'):$satuan}}">

                    @error('satuan')<div class="invalid-feedback"> {{$message}}</div>
                    @enderror

                  </div>
                </div>


@push('before-script')
<script type="text/javascript">
      // In your Javascript (external .js resource or <script> tag)
        $('.js-example-basic-single').select2({
                  theme: "classic",
                  // allowClear: true,
                  width: "resolve"
              });
 </script>
@endpush


<div class="form-group row align-items-center py-2">
    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Label / Kategori Produk </label>
    <div class="col-sm-6 col-md-9">

        <select class="js-example-basic-single form-control" name="label[]"  multiple="multiple" required>
            <option disabled value=""> Pilih Kategori</option>
            @php
               $labels=\App\Models\kategori::where('prefix','label')->get();
            @endphp
            @forelse ($labels as $label)
            @php
            $selected='';
            if($item){
                $periksalabel=\App\Models\label::where('nama',$label->nama)->where('prefix','produk')->where('parrent_id',$item->id)->count();
                if($periksalabel>0){
                    $selected='selected';
                }
            }
            @endphp
            <option {{$selected}}>{{$label->nama}}</option>
            @empty

            @endforelse
        </select>

    </div>
  </div>

              <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
              </div>
      </div>
      </form>

</div>
