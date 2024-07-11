<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th >Tanggal Transaksi</th>
              <th>Nama Toko</th>
              <th class="babeng-min-row text-center">Jumlah Produk</th>
              <th class="babeng-min-row text-center">Jumlah Barang</th>
              <th class="babeng-min-row text-center">Total Tagihan</th>
              <th class="babeng-min-row text-center">Penanggung Jawab</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            @php
            $url=route('api.produk.restokdetail',$item->id);
            @endphp
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btndelete link="{{route('admin.restok.destroy',$item->id)}}"></x-btndelete>
                    <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{$url}}',{{$item->id}})" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"><span
                        class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span></button>


                </td>
                {{-- <td>{{substr($item->kodetrans, 0, 7) . '...'}}</td> --}}
                <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
                <td>{{$item->namatoko}}</td>
                @php
                    $jumlahproduk = \App\Models\produkdetail::where('restok_id',$item->id)->count();
                    $jumlahbarang = \App\Models\produkdetail::where('restok_id',$item->id)->sum('jml');
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
    function btnModalDetailTransaksi(url=null,id=null){
        // console.log(url,id);

        //fetch
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                tbodyContent=``;
                $.each(data.data, function(index, value){
                    tbodyContent+=`
                        <tr>
                            <td class="text-center">${index+1}</td>
                            <td>${value.produk.nama}</td>
                            <td>${value.harga_beli}</td>
                            <td class="text-center">${value.jml}</td>
                            <td class="text-center">${value.harga_beli*value.jml}</td>
                        </tr>
                    `;
                });
      $('#trbody').html(tbodyContent);
            }
        });

    }
</script>
@endpush
