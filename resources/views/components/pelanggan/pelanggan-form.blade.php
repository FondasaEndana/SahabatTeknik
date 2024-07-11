<div>
    <form id="setting-form" method="POST" action="{{$item?route('admin.pelanggan.update',$item->id):route('admin.pelanggan.store')}}">
    @php
    //declare var
        $nama='';
        $username=null;
        $email=null;
        $jk=null;
        $alamat='';
        $telp='';
        $users_id='';
        $tipeuser='pelanggan';
        $nomerinduk=null;
        $password=null;
    @endphp
        @if($item)
        @method('put')
    @php
    //init while items>0
        $nama=$item->nama;
        $username=$item->users?$item->users->username:null;
        $email=$item->users?$item->users->email:null;
        $jk=$item->jk;
        $alamat=$item->alamat;
        $telp=$item->telp;
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

          @push('before-script')
<script>
    var InputanUrl= "{{route('api.users.periksausername')}}";
</script>
<script src="{{asset('/assets/js/babengvalidate.js')}}"></script>
          @endpush

            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelUsername">Username 
                    {{-- <i class="fa-solid fa-circle-xmark fill-current text-danger text-lg"></i> --}}
                    {{-- <i class="fa-solid fa-circle-check  fill-current text-info text-lg"></i> --}}
                </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" required  value="{{old('username')?old('username'):$username}}" id="inputUsername">

                  @error('username')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelEmail">Email </label>
                <div class="col-sm-6 col-md-9">

                  <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" required  value="{{old('email')?old('email'):$email}}" id="inputEmail">

                  @error('email')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>

              <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelPassword">Password </label>
                <div class="col-sm-6 col-md-9">

                  <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required  value="{{old('password')?old('password'):$password}}" id="inputPassword">

                  @error('password')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


              <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelPassword2">Konfirmasi Password </label>
                <div class="col-sm-6 col-md-9">

                  <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password2" required  value="{{old('password')?old('password'):$password}}"  id="inputPassword2">

                  @error('password')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Jenis Kelamin </label>
            <div class="col-sm-6 col-md-9">

              {{-- <input type="text" class="form-control  @error('jk') is-invalid @enderror" name="jk" required  value="{{old('jk')?old('jk'):$jk}}"> --}}
              <select class="js-example-basic-single form-control @error('jk') is-invalid @enderror" name="jk" required>
                @if($jk)
                <option >{{old('jk')?old('jk'):$jk}}</option>
                @else
                <option disabled value=""> Pilih Jenis Kelamin</option>
                  @if (old('jk'))
                  <option >{{old('jk')}}</option>
                  @endif
                @endif
                <option >Laki-laki</option>
                <option >Perempuan</option>
              </select>
              @error('jk')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Alamat </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" required  value="{{old('alamat')?old('alamat'):$alamat}}">

              @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">No Telp </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('telp') is-invalid @enderror" name="telp" required  value="{{old('telp')?old('telp'):$telp}}">

              @error('telp')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

              <div class="card-footer d-flex justify-content-between flex-row-reverse" id="divBtnSubmit">
                <span class="btn btn-dark" id="save-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled">Simpan</span>
              </div>
      </div>
      </form>

</div>