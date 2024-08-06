<x-cetak.cetak-style></x-cetak.cetak-style>
{{-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/babeng.css" /> --}}
<body>
<x-cetak.kop></x-cetak.kop>
<hr>
<table width="100%">
    <tr>
        <td width="35%">Laporan Jasa</td>
        <td width="1%">:</td>
        <td width="25%">{{Fungsi::bulanindo($bln)}} {{$thn}}</td>
        <td width="60%"></td>
    </tr>
</table>
<table id="tableBiasa2" width="100%">
    <tr>
        <th class="babeng-min-row" >No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Nama Servis</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Harga</th>
    </tr>
    @php
    $totalHarga = 0;
    @endphp
    @forelse ($items as $item)
    @php
        $totalHarga += $item->price;
    @endphp
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td align="center">{{ $item['phone'] }}</td>
            <td align="center">{{ $item['service_type'] }}</td>
            <td align="center">{{ $item['description'] }}</td>
            <td align="center">{{ \Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}</td>
            <td align="center">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">No data available</td>
        </tr>
    @endforelse
    <tr>
        <td colspan="7"><b>Total Harga</b></td>
        <td align="right"><b>Rp {{ number_format($totalHarga, 0, ',', '.') }}</b></td>
    </tr>
</table>
</body>
