<x-cetak.cetak-style></x-cetak.cetak-style>
{{-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/babeng.css" /> --}}
<body>
<x-cetak.kop></x-cetak.kop>
<hr>
<table width="100%">
  <tr>
      <td width="15%">Nama Pembeli</td>
      <td width="1%">:</td>
      <td width="25%">{{$items->pelanggan?$items->pelanggan->nama:$items->pelanggan_id}} - {{$items->pelanggan_tipe}}</td>
      <td width="60%"></td>
  </tr>
  <tr>
      <td width="15%">Jenis Transaksi</td>
      <td width="1%">:</td>
      <td width="25%">{{$items->transaksi_tipe}}</td>
      <td width="60%"></td>
  </tr>
  <tr>
      <td width="15%">Tanggal Transaksi</td>
      <td width="1%">:</td>
      <td width="25%">{{Fungsi::tanggalindo($items->tglbeli)}}</td>
      <td width="60%"></td>
  </tr>
  <tr>
      <td width="15%">Alamat Tujuan</td>
      <td width="1%">:</td>
      <td width="25%">{{$items->alamat}}</td>
      <td width="60%"></td>
  </tr>
  <tr>
      <td width="15%">No HP / WA</td>
      <td width="1%">:</td>
      <td width="25%">{{$items->telp}}</td>
      <td width="60%"></td>
  </tr>
  <tr>
      <td width="15%">Status Transaksi</td>
      <td width="1%">:</td>
      <td width="25%">{{$items->status}}</td>
      <td width="60%"></td>
  </tr>
</table>
<table id="tableBiasa2" width="100%">
    <tr>
        <th class="babeng-min-row" >No</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total</th>
    </tr>
    @forelse ($items->transaksidetail as $item)
    <tr>
        <td align="center">{{$loop->index+1}}</td>
        <td>{{$item->produk?$item->produk->nama:'Data tidak ditemukan'}}</td>
        <td align="center">{{$item->jml}}</td>
        <td align="right">{{Fungsi::rupiah($item->harga_akhir)}}</td>
        <td align="right">{{Fungsi::rupiah($item->jml*$item->harga_akhir)}}</td>
    </tr>
    @empty

    @endforelse
    <tr>
        <td colspan="4"><b>Total Tagihan</b></td>
        <td align="right"><b>{{Fungsi::rupiah($items->totaltagihan)}}</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>Ongkir</b></td>
        <td align="right"><b>{{Fungsi::rupiah($items->ongkir)}}</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>Total Harga</b></td>
        <td align="right"><b>{{Fungsi::rupiah($items->totalbayar)}}</b></td>
    </tr>
</table>
</body>
