<x-cetak.cetak-style></x-cetak.cetak-style>
{{-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/babeng.css" /> --}}
<body>
<x-cetak.kop></x-cetak.kop>
<hr>
<table width="100%">
  <tr>
      <td width="35%">Laporan Penjualan </td>
      <td width="1%">:</td>
      <td width="25%">{{Fungsi::bulanindo($bln)}} {{$thn}}</td>
      <td width="60%"></td>
  </tr>
</table>
<table id="tableBiasa2" width="100%">
    <tr>
        <th class="babeng-min-row" >No</th>
        <th>Tanggal Pembelian</th>
        <th>Status</th>
        <th>Nama Pelanggan</th>
        <th class="babeng-min-row">Jenis Pembelian</th>
        <th>Jumlah Produk</th>
        <th>Jumlah Barang</th>
        <th class="babeng-min-row">Total Tagihan</th>
        <th class="babeng-min-row">Penanggung Jawab</th>
    </tr>
    @php
$totalbayar=0;
    @endphp
    @forelse ($items as $item)
    @php
        $pelanggan=$item->pelanggan_id;
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
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
            <td align="center">{{ucfirst($item->status)}}</td>
            <td>{{$pelanggan}} - {{$item->pelanggan_tipe}}</td>
            <td align="center">{{$item->transaksi_tipe}}</td>
            @php
            $jumlahproduk = \App\Models\transaksidetail::where('transaksi_id',$item->id)->count();
            $jumlahbarang = \App\Models\transaksidetail::where('transaksi_id',$item->id)->sum('jml');
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
        <td colspan="8"><b>Total Harga</b></td>
        <td align="right"><b>{{Fungsi::rupiah($totalbayar)}}</b></td>
    </tr>
</table>
</body>
