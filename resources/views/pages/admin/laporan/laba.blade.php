@extends('layouts.default')
{{-- https://www.jurnal.id/id/blog/cara-menghitung-laba-bersih/ --}}
@section('title')
Laporan Laba Penjualan

@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<x-jstooltip/>
    <x-jsdatatable/>
    <h4 class="fw-bold py-3 mb-4">@yield('title')
        {{-- - (proses) tes {{ Fungsi::getHargaBeliMonth(1,'2022-07') }} --}}
    </h4>
    <div class="card px-2">
        <div class="row">
          <div class="col-xl-6 mb-xl-0 mb-3">
            <div
              class="btn-toolbar demo-inline-spacing"
              role="toolbar"
              aria-label="Toolbar with button groups"
            >
            @php
                $tgl=$tgl?$tgl:date('Y-m');
            @endphp
@push('after-style')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
@endpush
<form action="{{route('admin.laporanlaba')}}" method="get" >
            <div class="btn-group" role="group" aria-label="Third group">
                <input type="month" class="form-control  @error('tgl') is-invalid @enderror" name="tgl" required  value="{{$tgl}}" id="inputBlnThn">
    {{-- <input type="hidden" id="blnthn" name="blnthn"> --}}
    <button  type="submit" type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Pilih">
        <i class="fa-solid fa-hand-pointer"></i>
    </button>
    {{-- <button  type="submit" type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak">
        <i class="fa-solid fa-print"></i>
    </button> --}}
</form>
            </div>

            </div>
          </div>
        </div>
    </div>
@php
    $totalpendapatan=0;
    $jml=0;
    foreach($items as $item){
        $gethargabeli=\App\Models\transaksidetail::where('transaksi_id',$item->id)->get();
        $jml=\App\Models\transaksidetail::where('transaksi_id',$item->id)->sum('jml');
        foreach($gethargabeli as $gh){
            $totalpendapatan+=$gh->jml*$gh->harga_jual;
        }
    }
    // dd($items,$gethargabeli,$jml);
@endphp

        <div class="card py-4">
            <div class="container">
                 <h4>Total Pendapatan  = {{ Fungsi::rupiah($totalpendapatan) }} ({{ $jml }}) Barang  </h4>
             </div>

@php
$beban=0;
$jml=0;
foreach($items as $item){
    $gethargabeli=\App\Models\transaksidetail::where('transaksi_id',$item->id)->get();
    $jml=\App\Models\transaksidetail::where('transaksi_id',$item->id)->sum('jml');
    foreach($gethargabeli as $gh){
        $hargabeli=Fungsi::getHargaBeliMonth($gh->produk_id,$item->tglbeli);
        $beban+=$gh->jml*$hargabeli;
    }
}
// dd($items,$gethargabeli,$jml);
$lababersih=0;
$lababersih=$totalpendapatan-$beban;
$marginlababersih=0;
if($totalpendapatan>0){
$marginlababersih=round(($lababersih/$totalpendapatan*100),2);
}
@endphp
            <div class="container">
                {{-- beban = jumlah barang * rata-rata harga_beli(restok) --}}
                  <h4>Beban =  {{ Fungsi::rupiah($beban) }} ({{ $jml }}) Barang </h4>
            </div>
            <div class="container">
                {{-- Laba Bersih = Total Pendapatan – Total Pengeluaran (beban) --}}
                  <h4> Laba Bersih = {{ Fungsi::rupiah($lababersih) }} </h4>
            </div>
            <div class="container">
                {{-- Margin Laba Bersih = (Laba Bersih / Total Pendapatan) X 100 --}}
                  <h4> Margin Laba Bersih = {{ $marginlababersih }} %</h4>
            </div>
    </div>


    <div class="card py-10">
        <div class="container">
             <h4>Catatan :</h4>
<ol>
    <li> <code> Total Pendapatan = jumlah barang * hargajual(transaksi)</code></li>
    <li><code> beban = jumlah barang(transaksi) * rata-rata harga_beli(restok)</code></li>
    <li><code>Laba Bersih = Total Pendapatan – Total Pengeluaran (beban)</code></li>
    <li> <code> Margin Laba Bersih = (Laba Bersih / Total Pendapatan) X 100</code></li>
</ol>




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
