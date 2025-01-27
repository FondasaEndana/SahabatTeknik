@extends('layouts.default')

@section('title')
Laporan Penjualan
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}" />
@endif
@endpush

@section('content')
<x-jstooltip />
<x-jsdatatable />
<h4 class="fw-bold py-3 mb-4">@yield('title')</h4>
<div class="card px-2">
    <div class="row">
        <div class="col-xl-6 mb-xl-0 mb-3">
            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                @php
                $tgl=date('Y-m');
                @endphp
                @push('after-style')
                <script src="{{asset('/assets/js/babeng.js')}}"></script>
                @endpush
                <script>
                    //fungsi
                    function fnPilihBlnThn(e) {
                        $('#blnthn').val(e.value);
                        // console.log(e.value);
                        //ajax fetch data with 2 field
                        $.ajax({
                            url: "{{route('api.laporan.penjualan')}}",
                            type: "GET",
                            data: {
                                'blnthn': e.value
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                let itemsBodyContent = ``;
                                data.data.forEach(function(item, index) {
                                    pelanggan = '';
                                    warnapelanggan = 'info';
                                    warnatransaksi = 'secondary';
                                    warnastatus = 'secondary';
                                    if (item.pelanggan_tipe == 'member') {
                                        warnapelanggan = 'success';
                                        pelanggan = item.pelanggan ? item.pelanggan.nama : item.pelanggan_id;
                                    } else {
                                        pelanggan = item.pelanggan_id;
                                    }
                                    if (item.transaksi_tipe == 'online') {
                                        warnatransaksi = 'success';
                                    }
                                    if (item.status == 'success') {
                                        warnastatus = 'success';
                                    }

                                    if (item.status == 'cancel') {
                                        warnastatus = 'danger';
                                    }
                                    itemsBodyContent += `
                                <tr>
                                    <td>${index+1}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{url("/")}}/restapi/datatransaksi/${item.id}',${item.id})" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"><span
                            class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span></button>
                                    </td>
                                    <td>${tanggalindo(item.tglbeli)}</td>
                                    <td><span class="btn btn-${warnastatus} me-1 text-dark text-capitalize">${item.status}</span></td>
                <td class="text-center babeng-min-row">${pelanggan}  <span class="btn btn-${warnapelanggan} text-dark me-1 text-capitalize">${item.pelanggan_tipe}</span> </td>
                <td class="text-center"><span class="btn btn-${warnatransaksi} me-1 text-capitalize text-dark">${item.transaksi_tipe}</span></td>
                <td class="text-center">${item.jumlahproduk}</td>
                <td class="text-center">${item.jumlahbarang}</td>
                <td class="text-center">${rupiah(item.totalbayar)}</td>
                <td class="text-center">${item.penanggungjawab}</td>
                                </tr>
                                `;
                                });

                                $('#itemsBody').html(itemsBodyContent);
                            }
                        });

                    }
                </script>
                <div class="btn-group" role="group" aria-label="Third group">
                    <input type="month" onchange="fnPilihBlnThn(this)" class="form-control  @error('tgl') is-invalid @enderror" name="tgl" required value="{{old('tgl')?old('tgl'):$tgl}}" id="inputBlnThn">
                    <form action="{{route('admin.laporanpenjualan.cetak')}}">
                        <input type="hidden" id="blnthn" name="blnthn">
                        <button type="submit" type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak">
                            <i class="fa-solid fa-print"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table-responsive px-2 py-2">
        <table id="datatable" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th class="babeng-min-row text-center">No</th>
                    <th class="text-center">Aksi</th>
                    <th>Tanggal Pembelian</th>
                    <th class="babeng-min-row text-center">Status</th>
                    <th>Nama Pelanggan</th>
                    <th class="babeng-min-row text-center">Jenis Pembelian</th>
                    <th class="babeng-min-row text-center">Jumlah Produk</th>
                    <th class="babeng-min-row text-center">Jumlah Barang</th>
                    <th class="babeng-min-row text-center">Total Tagihan</th>
                    <th class="babeng-min-row text-center">Penanggung Jawab</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="itemsBody">
                @forelse ($items as $item)
                @php
                $url=route('api.transaksi.detail',$item->id);
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
                <tr>
                    <td class="text-center">{{$loop->index+1}}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{$url}}',{{$item->id}})" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"><span class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span></button>

                    </td>
                    <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
                    <td><span class="btn btn-{{$warnastatus}} me-1 text-dark text-capitalize">{{$item->status}}</span></td>
                    <td class="text-center babeng-min-row">{{$pelanggan}} <span class="btn btn-{{$warnapelanggan}} text-dark me-1 text-capitalize">{{$item->pelanggan_tipe}}</span> </td>
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

            </tbody>
        </table>
    </div>
</div>

@push('before-script')
<script>
    let tbodyContent = ``;

    function btnModalDetailTransaksi(url = null, id = null) {
        // console.log(url,id);
        console.log('URL:', url); // Tambahkan ini
        console.log('ID:', id);

        //fetch
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data); // Tambahkan ini untuk melihat data di console browser
                tbodyContent = ``;
                $.each(data.data, function(index, value) {
                    tbodyContent += `
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

    }
</script>
@endpush

@endsection

@section('containermodal')

<!-- Modal -->
<div class="modal fade" id="modalDetailTransaksi" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <x-babeng.table-two>
                    <x-slot name="thead">
                        <th class="babeng-min-row text-center">No</th>
                        <th>Nama</th>
                        <th>Harga </th>
                        <th class="text-center babeng-min-row">Jumlah</th>
                        <th class="text-center">Total Harga</th>
                    </x-slot>
                    <x-slot name="tbody">
                        <tbody class="table-border-bottom-0" id="trbody">
                        </tbody>
                    </x-slot>
                </x-babeng.table-two>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection