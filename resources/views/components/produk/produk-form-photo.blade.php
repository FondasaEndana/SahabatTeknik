<div>
    <form id="setting-form" method="POST" action="{{route('admin.produk.uploadphoto',$item->id)}}" enctype="multipart/form-data">
    @php
    //declare var
        $photo='';
        $photo_old='https://ui-avatars.com/api/?name=00&color=7F9CF5&background=EBF4FF';
        $getphoto=\App\Models\image::where('parrent_id',$item->id)->where('prefix','produk')->first();
        // dd($getphoto,$item);
        if($getphoto){
            $photo_old=url('/').'/'.$getphoto->photo;
        }
    @endphp
        @csrf
    <div class="row py-2 px-2">
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Upload Photo Produk <br>.jpg / .png / .svg || Max 2Mb</label>
            <div class="col-sm-6 col-md-9">

              <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" required  value="{{old('photo')?old('photo'):$photo}}" id="formFile" onchange="preview()">

              @error('photo')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>
          <div class="mb-5">

        </div>
        <div class="flex justify-center">
        <img id="frame" src="{{$photo_old}}" class="w-px-200 h-auto "  style="display: block;max-width: 100%;height: 200px;object-fit: cover" />
    </div>
@push('after-style')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
</script>
@endpush





              <div class="card-footer d-flex  flex-row-reverse" id="divBtnSubmit">

                <button type="submit" class="btn btn-primary" id="save-btn" data-bs-toggle="tooltip" data-bs-placement="top">Upload</button>
                <button onclick="clearImage()" class="btn btn-danger ml-2 mr-2">Clear</button>
              </div>
      </div>
      </form>

</div>
