<div >
    <div class="row py-2 px-2">
        <div class="col-sm-6 col-md-9" >
    <div class="btn-group" role="group" aria-label="Third group" id="onlineoffine">
        <button type="button" class="btn btn-dark mr-0 text-secondary" data-bs-placement="top" title="Online"
            data-bs-toggle="toggle"  id="buttonOnline">
            <i class="fa-solid fa-earth-asia"></i> Online
        </button>
        <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Offine"
            data-bs-toggle="toggle" id="buttonOffline">
            <i class="fa-solid fa-power-off"></i> Offline
        </button>
    </div>
</div>
</div>
@push('before-script')
<script type="text/javascript">
      // In your Javascript (external .js resource or <script> tag)
          $(document).ready(function() {
              $('.js-example-basic-single').select2({
                  theme: "classic",
                  // allowClear: true,
                  width: "resolve"
              });
          });
 </script>
<script>
    $(function () {
        let transaksiTipe='offline';
    $("#buttonOnline").on("click", function(){
        transaksiTipe='online';
            $("#buttonOnline").addClass("btn-info text-white");
            $("#buttonOnline").removeClass("btn-dark");
            $("#buttonOffline").addClass("btn-dark text-secondary");
            $("#buttonOffline").removeClass("btn-info text-white");
        document.getElementById("inputTransaksiTipe").value = transaksiTipe;
        dataProvinsi=document.getElementById("dataProvinsi");
    let divOnlineString=`
    <div class="form-group row align-items-center py-2" id="divonline">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Pilih Provinsi</label>
            <div class="col-sm-4 col-md-7">

                <select class="js-example-basic-single form-control-sm @error('provinsi')
                is-invalid
            @enderror" name="provinsi"  style="width: 100%" id="dataProvinsi"  onchange="getDataProvinsi(this)" >
                <option disabled selected value=""> Pilih Provinsi</option>

              </select>
              <input type="hidden" name="provinsi_id" id="provinsi_id" value="">
              <input type="hidden" name="provinsi_nama" id="provinsi_nama" value="">
              <input type="hidden" name="city_id" id="city_id" value="">
              <input type="hidden" name="city_nama" id="city_nama" value="">

              @error('provinsi')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
            </div>

          <div class="form-group row align-items-center py-2" id="divonline">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Pilih Kota</label>
            <div class="col-sm-4 col-md-7">


                <select class="js-example-basic-single form-control-sm @error('city')
                is-invalid
            @enderror" name="city"  style="width: 100%" id="dataCity"  onchange="getDataCity(this)" >
                <option disabled selected value=""> Pilih Kota / Kabupaten</option>

              </select>
              <input type="hidden" name="city_nama" id="city_nama" value="">

              @error('kota')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
            </div>
            <div class="form-group row align-items-center py-2" id="divonline">
                <label for="site-title" class="form-control-label col-sm-5 text-md-right">No HP/WA</label>
                <div class="col-sm-4 col-md-7">

                  <input type="text" class="form-control  @error('telp') is-invalid @enderror" name="telp" required  value="">

                  @error('telp')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
                </div>



    <label for="site-title" class="form-control-label col-sm-5 text-md-right">Alamat Penerima</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" required  value="">

              @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>`;
        $("#divonline").html(divOnlineString);
            getDatas()

        console.log("Online");
   });

   $("#buttonOffline").on("click", function(){
    document.getElementById("totalbayar").value =document.getElementById("totaltagihan").value;
    document.getElementById("ongkir").value =0;
        transaksiTipe='offline';
            $("#buttonOffline").addClass("btn-info text-white");
            $("#buttonOffline").removeClass("btn-dark");
            $("#buttonOnline").addClass("btn-dark text-secondary");
            $("#buttonOnline").removeClass("btn-info text-white");
        document.getElementById("inputTransaksiTipe").value = transaksiTipe;
    let divOnlineString=`
              <input type="hidden" class="form-control  " name="alamat"   value="">`;
        $("#divonline").html(divOnlineString);
   });

    });
</script>
@endpush


<div class="row py-2 px-2">
<div class="col-sm-6 col-md-9" id="membernonmember">
    <div class="btn-group" role="group" aria-label="Third group">
        <button type="button" class="btn btn-dark mr-0 text-secondary" data-bs-placement="top" title="Member"
            data-bs-toggle="toggle" id="buttonMember">
            <i class="fa-solid fa-user-large"></i> Member
        </button>

        <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Non-Member Active"
            data-bs-toggle="toggle" id="buttonNonmember">
            <i class="fa-solid fa-user-large-slash"></i> Non-Member
        </button>
    </div>
</div>
</div>
{{-- {{dd($pelanggan)}} --}}
@push('before-script')
<script>
    $(function () {

        let pelangganTipe='nonmember';
    $("#buttonMember").on("click", function(){
        pelangganTipe='member';
            $("#buttonMember").addClass("btn-info text-white");
            $("#buttonMember").removeClass("btn-dark");
            $("#buttonNonmember").addClass("btn-dark text-secondary");
            $("#buttonNonmember").removeClass("btn-info text-white");
        document.getElementById("inputPelangganTipe").value = pelangganTipe;
        let selectPelanggan_id=`<select class="js-example-basic-single form-control" name="pelanggan_id"   required>
                        <option disabled value=""> Pilih Pelanggan</option>`;
        @forelse ($pelanggan as $item)
            selectPelanggan_id+=`<option value="{{$item->id}}">{{$item->nama}}</option>`;
        @empty

        @endforelse
                            // <option value="1"> 1</option>
                      selectPelanggan_id+=`</select>`;
        $('#divpelanggan_id').html(selectPelanggan_id);

        $('.js-example-basic-single').select2({
                  theme: "classic",
                  // allowClear: true,
                  width: "resolve"
              });
        console.log("member");
   });

   $("#buttonNonmember").on("click", function(){
        pelangganTipe='nonmember';
            $("#buttonNonmember").addClass("btn-info text-white");
            $("#buttonNonmember").removeClass("btn-dark");
            $("#buttonMember").addClass("btn-dark text-secondary");
            $("#buttonMember").removeClass("btn-info text-white");
        document.getElementById("inputPelangganTipe").value = pelangganTipe;
        let divpelangganString=`<input type="text" class="form-control " name="pelanggan_id" required  value="">`;
        $('#divpelanggan_id').html(divpelangganString);
        console.log("Offline");
        console.log("nonmember");
   });


   let dataProvinsi=document.getElementById("dataProvinsi");
    let dataCity=document.getElementById("dataCity");
    let ongkir=document.getElementById("ongkir");
    let totalbayarNumber=document.getElementById("totalbayarNumber");
    let totalbayar=document.getElementById("totalbayar");
    let weightInputan=document.getElementById("weight");
// let dataKabupaten=document.getElementById("dataKabupaten");
// let kab = document.getElementsByClassName("kab");
        //ambildatanconst
getDatas = async () => {
    dataProvinsi=document.getElementById("dataProvinsi");
//  axios.get('https://reqres.in/api/users')
await axios.get('http://127.0.0.1:8000/pelanggan/rajaongkir/province',)
 .then(response => {
  let datas =  response.data.rajaongkir.results;

//   dataKabupaten.remove();
//     dataKecamatan.remove();
dataProvinsi.innerHTML=`<option disabled selected value=""> Pilih Provinsi</option>`;
  datas.forEach(function(data){
    // console.log(data);
    // addOption(data.id,data.nama);

    dataProvinsi.innerHTML += `
    <option value="${data.province_id}"> ${data.province}</option>
    `;
  })
//   console.log(`GET data`, datas);
// console.log('tes');
})
 .catch(error => console.error(error));
};
getDatas();



function rupiah(angka){
    var	number_string = angka.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return rupiah;

}
// onchange
getDataProvinsi=(sel)=>{

let value = sel.value;
let text = sel.options[sel.selectedIndex].text;
provinsi_id.value=value;
provinsi_nama.value=text;
  console.log(value+' '+text);

//ambildataKabupaten
getDatasKota(value);


}



getDatasKota = async (id=11) => {
    dataCity=document.getElementById("dataCity");
//  axios.get('https://reqres.in/api/users')
await axios.get(`http://127.0.0.1:8000/pelanggan/rajaongkir/city?provinsi_id=${id}`)
 .then(response => {
  let datas =  response.data.rajaongkir.results;

//   dataKabupaten.remove();
//     dataKecamatan.remove();
dataCity.innerHTML=`<option disabled selected value=""> Pilih Kota / Kabupaten</option>`;
  datas.forEach(function(data){

    dataCity.innerHTML += `
    <option value="${data.city_id}">${data.type} ${data.city_name} </option>
    `;
  })
  console.log(`GET data`, datas);
})
 .catch(error => console.error(error));
};


// onchange
getDataCity=async(sel=null)=>{

     ongkir=document.getElementById("ongkir");
     totalbayarNumber=document.getElementById("totalbayarNumber");
     totalbayar=document.getElementById("totalbayar");
     weightInputan=document.getElementById("weight");
let provinsi_id=11,city=255,courir='jne',weight=100;

weight=weightInputan.value;
console.log(weight);
if(sel){
    let value = sel.value;
let text = sel.options[sel.selectedIndex].text;
city_id.value=value;
city_nama.value=text;
city=value;
  console.log(value+' '+text);
}

//ambildataOngkir

//  axios.get('https://reqres.in/api/users')
await axios.get(`http://127.0.0.1:8000/pelanggan/rajaongkir/cost?provinsi_id=${provinsi_id}&city_id=${city}&courir=${courir}&weight=${weight}`)
 .then(response => {
  let datas =  response.data.rajaongkir.results;
  datas.forEach(function(data){
    // dataCity.innerHTML += `
    // <option value="${data.city_id}">${data.type} ${data.city_name} </option>
    // `;
    console.log(data.name,data.code,data.costs,data.costs[0].cost[0].value);
    // console.log(sumtotalbayar);
    ongkir.value=data.costs[0].cost[0].value;
    let totalbayarNow=parseInt(totalbayarNumber.value)+parseInt(data.costs[0].cost[0].value);
    totalbayar.value=`Rp ${rupiah(totalbayarNow)}`;
  })
  console.log(`GET data`, datas);
})
 .catch(error => console.error(error));


}

    });
</script>
@endpush
    <form id="setting-form" method="POST" action="{{route('admin.transaksi.store')}}">
    @php
    //declare var
        $nama=''; //pelanggan_id ,jika bukan member = diisi nama , jika member diisi pelanggan_id
        $tipe=''; //pelanggan_tipe , Offline / Online
        $alamat=''; //alamat kosong jika tipe = offine, jika member diisi alamat pelanggan (awal), bisa diedit jika alamat ganti, jika bukan member wajib diisi
        $tglbeli=date('Y-m-d');
        $penanggungjawab=''; //admin /operator
    @endphp
        @csrf

        <input type="hidden" class="form-control  " name="transaksi_tipe" id="inputTransaksiTipe" value="offline" >
        <input type="hidden" class="form-control  " name="pelanggan_tipe" id="inputPelangganTipe" value="nonmember" >
        <input type="hidden" class="form-control  @error('kodetrans') is-invalid @enderror" id="kodetrans" name="kodetrans" value="{{$kodetrans}}" >

        <input type="hidden" class="form-control  @error('cart') is-invalid @enderror" id="cart" name="cart"  >
        <input type="hidden" class="form-control  @error('totalbayarNumber') is-invalid @enderror" id="totalbayarNumber" name="totalbayarNumber"  >




    <div class="row py-2 px-2" id="formtwo">
            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-5 text-md-right">Nama Pelanggan</label>
                <div class="col-sm-4 col-md-7" id="divpelanggan_id" >
                  <input type="text" class="form-control  @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" required  value="{{old('pelanggan_id')?old('pelanggan_id'):$nama}}">
                  @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror
                </div>
              </div>




        <div class="form-group row align-items-center py-2" id="divonline">

            <input type="hidden" class="form-control " name="alamat"   value="">
          </div>

          <div class="form-group row align-items-center py-2" id="divonline">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Berat *) gram</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('berat') is-invalid @enderror" name="berat" required  value="0" readonly id="berat">
              <input type="hidden" class="form-control  @error('weight') is-invalid @enderror" name="weight" required  value="0" readonly id="weight">

              @error('berat')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
            </div>

          <div class="form-group row align-items-center py-2" id="divonline">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Ongkir</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('ongkir') is-invalid @enderror" name="ongkir" required  value="0" readonly id="ongkir">

              @error('ongkir')<div class="invalid-feedback"> {{$message}}</div>
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

              <input type="text" class="form-control  @error('totaltagihan') is-invalid @enderror" name="totaltagihan"  readonly id="totaltagihan" value="0">

              @error('totaltagihan')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Bayar</label>
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
