<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th>Nama</th>
              <th>Harga Beli (Rata-rata)</th>
              <th>Harga Jual</th>
              <th class="text-center">Stok</th>
              <th class="text-center">Berat</th>
              <th class="text-center">Terjual</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Photo</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btnedit link="{{route('admin.produk.edit',$item->id)}}"></x-btnedit>
                    <x-btndelete link="{{route('admin.produk.destroy',$item->id)}}"></x-btndelete>
                </td>
                <td>{{$item->nama}}</td>
                @php
                    $getHargaBeli=\App\Models\produkdetail::where('produk_id',$item->id)->get();
                    $harga_beli=0;
                    $ttl=0;
                    $jmlbrg=0;
                    foreach($getHargaBeli as $pd){
                        $ttl+=$pd->harga_beli*$pd->jml;
                        $jmlbrg+=$pd->jml;
                    }
                    if($jmlbrg>0){
                    $harga_beli=round($ttl/$jmlbrg,0);
                    }
                @endphp
                <td>{{Fungsi::rupiah($harga_beli)}}</td>
                <td>{{Fungsi::rupiah($item->harga_jual)}}</td>
                @php
                    $getstok=\App\Models\produkdetail::where('produk_id',$item->id)->sum('jml');
                    $getterjual=\App\Models\transaksidetail::where('produk_id',$item->id)->whereHas('transaksi', function ($query) {
                        $query->where('status', '<>', 'cancel');
                    })->sum('jml');
                @endphp
                <td class="text-center">{{ $getstok-$getterjual}}</td>
                <td class="text-center">{{$item->berat}} g</td>
                <td class="text-center">{{$getterjual}}</td>
                <td class="text-center">{{$item->satuan}}</td>
                @php
        $photo_old='https://ui-avatars.com/api/?name='.$item->nama.'&color=7F9CF5&background=EBF4FF';
        $getphoto=\App\Models\image::where('parrent_id',$item->id)->where('prefix','produk')->first();
        if($getphoto){
            $photo_old=url('/').'/'.$getphoto->photo;
        }
                @endphp
                <td  class="text-center babeng-min-row">
                    <img id="frame" src="{{$photo_old}}" class="w-px-10 h-auto "  style="display: block;max-width: 60px;height: 60px;object-fit: cover" />
                </td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>
