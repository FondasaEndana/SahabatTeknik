<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th >Tanggal Transaksi</th>
              <th class="babeng-min-row text-center">Status</th>
              <th>Nama Pelanggan</th>
              <th class="babeng-min-row text-center">Jenis Pembelian</th>
              <th class="babeng-min-row text-center">Jumlah Produk</th>
              <th class="babeng-min-row text-center">Jumlah Barang</th>
              <th class="babeng-min-row text-center">Total Tagihan</th>
              <th class="babeng-min-row text-center">Penanggung Jawab</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            @php
            $urlModalDetail=route('api.transaksi.detail',$item->id);
            $urlModalDetailUpdate=route('admin.transaksi.konfirmasi',$item->id);
                $pelanggan='';
                $warnapelanggan='info';
                $warnatransaksi='secondary';
                $warnastatus='secondary';
                if($item->pelanggan_tipe=='member'){
                    $warnapelanggan='success';
                    $pelanggan=$item->pelanggan?$item->pelanggan->nama:'Pelangan tidak ditemukan';
                }else{
                    $pelanggan=$item->pelanggan_id;
                }
                if($item->transaksi_tipe=='online'){
                    $warnatransaksi='success';
                }
                if($item->status=='success'){
                    $warnastatus='success';
                }

                if($item->status=='cancel'){
                    $warnastatus='danger';
                }
            @endphp
            @php
            $url=route('api.produk.restokdetail',$item->id);
            @endphp
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    @if(Auth()->user()->tipeuser=='admin')
                    <x-btndelete link="{{route('admin.transaksi.destroy',$item->id)}}"></x-btndelete>
                    @endif
                   {{-- @if ($item->status=='pending') --}}
                   <button class="btn btn-success btn-sm"  onclick="btnModalDetailTransaksi('{{$urlModalDetail}}',{{$item->id}},'{{$item->status}}','{{$urlModalDetailUpdate}}','{{ Fungsi::rupiah($item->totalbayar) }}','{{ Fungsi::rupiah($item->totaltagihan) }}' ,'{{ Fungsi::rupiah($item->ongkir) }}')" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi" ><span
                    class="pcoded-micon"> <i class="fa-regular fa-circle-check"></i></span></button>
                   {{-- @endif --}}

                   {{-- @if(Auth()->user()->tipeuser=='admin') --}}
                    <a href="{{route('cetak.transaksi',$item->kodetrans)}}" class="btn btn-info btn-sm"   data-bs-toggle="tooltip" data-bs-placement="top" title="Invoice" onclick="return confirm('Anda yakin melihat data ini? Y/N')"><span
                        class="pcoded-micon"> <i class="fa-solid fa-file-invoice" ></i></span></a>
                    {{-- @endif --}}

                </td>
                {{-- <td>{{substr($item->kodetrans, 0, 7) . '...'}}</td> --}}
                <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
                <td><span class="btn btn-{{$warnastatus}} me-1 text-dark text-capitalize">{{$item->status}}</span></td>
                <td class="text-center babeng-min-row">{{$pelanggan}}  <span class="btn btn-{{$warnapelanggan}} text-dark me-1 text-capitalize">{{$item->pelanggan_tipe}}</span> </td>
                <td class="text-center"><span class="btn btn-{{$warnatransaksi}} me-1 text-capitalize text-dark">{{$item->transaksi_tipe}}</span></td>
                @php
                    $jumlahproduk = \App\Models\transaksidetail::where('transaksi_id',$item->id)->count();
                    $jumlahbarang = \App\Models\transaksidetail::where('transaksi_id',$item->id)->sum('jml');
                @endphp
                <td class="text-center">{{$jumlahproduk}}</td>
                <td class="text-center">{{$jumlahbarang}}</td>
                <td class="text-center">{{Fungsi::rupiah($item->totalbayar)}}</td>
                <td class="text-center">{{$item->penanggungjawab}}</td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>

@push('before-script')
<script>
    let tbodyContent=``;
    var buktipembayaran=null;
    var kodetransaksi=null;
    function btnModalDetailTransaksi(url=null,id=null,status=null,urlUpdate=null,totalbayar=null,totaltagihan=0,ongkir=0){

        // console.log(url,id);
        //fetch
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                tbodyContent=``;
                buktipembayaran=data.bukti;
                kodetransaksi=data.kodetrans;
                // console.log(kodetransaksi);
let divModalBuktiContent=`Bukti Pembayaran Belum di upload!`;
if(buktipembayaran){
    divModalBuktiContent=`
    <h5 class="modal-title" id="formModalLabel">Bukti Pembayaran</h5>
    <img id="frame" src="${buktipembayaran}" class="w-px-400 h-auto "  style="display: block;max-width: 100%;height: 200px;object-fit: cover" />`;
}

let divModalDetailContent=`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>`;
if(status=='pending'){
            divModalDetailContent=`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
@if(Auth()->user()->tipeuser=='admin')
    <form action="${urlUpdate}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="status" value="cancel">
    <button class="btn  btn-danger "
        onclick="return  confirm('Anda yakin mengkonfirmasi data ini? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Konfirmasi data!"> Batalkan Pembelian!</button>

</form>

<form action="${urlUpdate}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="status" value="success">
    <button class="btn  btn-success "
        onclick="return  confirm('Anda yakin mengkonfirmasi data ini? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Konfirmasi data!"> Konfirmasi Pembelian!</button>

</form>
@endif
@php
    $kodetrans=0;
    if(!empty($item)){
        $kodetrans=$item->kodetrans;
    }
@endphp

@if(Auth()->user()->tipeuser=='pelanggan')
<a href="{{url('/pelanggan/transaksi/upoadbukti/')}}/${kodetransaksi}" class="btn  btn-info "
        onclick="return  confirm('Anda yakin mengkonfirmasi data ini? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Konfirmasi data!"> Upload bukti pembayaran!</a>
@endif

            `;
 }

 if(status=='success' || status=='cancel'){
            divModalDetailContent=`  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            @if(Auth()->user()->tipeuser=='admin')
            <form action="${urlUpdate}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="status" value="pending">
    <button class="btn  btn-dark "
        onclick="return  confirm('Anda yakin mengkonfirmasi data ini? Y/N')"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pending data!"> Pending Pembelian!</button>

</form>
@endif`;
            // divModalDetailContent=`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            // <button type="button" class="btn btn-info" data-bs-dismiss="modal">Tunggu Konfirmasi </button>
            // `;
        }
        $('#divModalDetail').html(divModalDetailContent);
        let modalTransaksiDetail=`<div>
            <H5>KodeTrans : ${kodetransaksi}</H5>
        <br>
        <h5>Total Tagihan : ${totaltagihan}</h5>
        <br>
        <h5>Ongkir : ${ongkir}</h5>
        <br>
        <h5>Total bayar : ${totalbayar}</h5>
            </div>
        `;
        $('#divModalTransaksiDetail').html(modalTransaksiDetail);
        $('#divModalBukti').html(divModalBuktiContent);
                // console.log(buktipembayaran);
                $.each(data.data, function(index, value){
                    tbodyContent+=`
                        <tr>
                            <td class="text-center">${index+1}</td>
                            <td>${value.produk.nama}</td>
                            <td>${value.harga_jual}</td>
                            <td class="text-center">${value.jml}</td>
                            <td class="text-center">${value.harga_jual*value.jml}</td>
                        </tr>
                    `;
                });
      $('#trbody').html(tbodyContent);
            }
        });


// console.log(buktipembayaran);
    }
</script>
@endpush
