<x-cetak.cetak-style></x-cetak.cetak-style>
{{-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/babeng.css" /> --}}
<body>
<x-cetak.kop></x-cetak.kop>
<hr>
<table width="100%">
  <tr>
      <td width="35%">Laporan Pengadaan Barang </td>
      <td width="1%">:</td>
      <td width="25%">{{Fungsi::bulanindo($bln)}} {{$thn}}</td>
      <td width="60%"></td>
  </tr>
</table>
<table id="tableBiasa2" width="100%">
    <tr>
        <th class="babeng-min-row" >No</th>
        <th>Tanggal Pembelian</th>
        <th>Nama Toko</th>
        <th>Jumlah Produk</th>
        <th>Jumlah Barang</th>
        <th>Total Tagihan</th>
        <th>Penanggung Jawab</th>
    </tr>
    @php
$totalbayar=0;
    @endphp
    @forelse ($items as $item)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
            <td>{{$item->namatoko}}</td>
            @php
                $jumlahproduk = \App\Models\produkdetail::where('restok_id',$item->id)->count();
                $jumlahbarang = \App\Models\produkdetail::where('restok_id',$item->id)->sum('jml');
            @endphp
            <td align="center">{{$jumlahproduk}}</td>
            <td align="center">{{$jumlahbarang}}</td>
            <td align="center">{{Fungsi::rupiah($item->totalbayar)}}</td>
            @php
                $totalbayar+=$item->totalbayar;
            @endphp
            <td align="center">{{$item->penanggungjawab}}</td>
        </tr>
    @empty

    @endforelse
    <tr>
        <td colspan="6"><b>Total Harga</b></td>
        <td align="right"><b>{{Fungsi::rupiah($totalbayar)}}</b></td>
    </tr>
</table>
</body>
