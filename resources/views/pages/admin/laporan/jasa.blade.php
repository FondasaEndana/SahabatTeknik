@extends('layouts.default')

@section('title')
Laporan Jasa
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
                $tgl = date('Y-m');
                @endphp
                <div class="btn-group" role="group" aria-label="Third group">
                    <input type="month" onchange="fnPilihBlnThn(this)" class="form-control @error('tgl') is-invalid @enderror" name="tgl" required value="{{ old('tgl') ? old('tgl') : $tgl }}" id="inputBlnThn">
                    <form action="{{ route('admin.laporanjasa.cetak') }}">
                        <input type="hidden" id="blnthn" name="blnthn">
                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak">
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
                    <th class="babeng-min-row text-center">Aksi</th>
                    <th class="text-center">Nama</th>
                    <th class="babeng-min-row text-center">Total Harga Jasa</th>
                    <th class="babeng-min-row text-center">No HP</th>
                    <th class="babeng-min-row text-center">Tipe Servis</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="itemsBody">
                @forelse ($items as $item)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{ route('api.produk.jasadetail', $item->id) }}')" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi">
                            <span class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span>
                        </button>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $item->phone }}</td>
                    <td class="text-center">{{ $item->service_type }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No data available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
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
                <table class="table table-striped table-bordered table-md">
                    <thead>
                        <tr>
                            <th class="babeng-min-row text-center">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="babeng-min-row">Total Harga Jasa</th>
                            <th class="text-center babeng-min-row">No HP</th>
                            <th class="text-center">Tipe Servis</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="trbody">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-style')
<script src="{{ asset('/assets/js/babeng.js') }}"></script>
@endpush

@push('before-script')
<script>
    function fnPilihBlnThn(e) {
        $('#blnthn').val(e.value);
        $.ajax({
            url: "{{ route('api.laporan.jasa') }}",
            type: "GET",
            data: {
                'blnthn': e.value
            },
            dataType: "json",
            cache: false, // Nonaktifkan cache
            success: function(data) {
                console.log("Data fetched:", data);
                let itemsBodyContent = ``;
                data.data.forEach(function(item, index) {
                    let detailUrl = "{{ url('/') }}/api/jasadetail/" + item.id;
                    itemsBodyContent += `
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{ url("/") }}/restapi/jasadetail/${item.id}',${item.id})" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi">
                                <span class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span>
                            </button>
                        </td>
                        <td>${item.name}</td>
                        <td class="text-center">Rp ${number_format(item.price, 0, ',', '.')}</td>
                        <td class="text-center">${item.phone}</td>
                        <td class="text-center">${item.service_type}</td>
                    </tr>
                    `;
                });
                $('#itemsBody').html(itemsBodyContent);
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
                console.error("Response Text:", xhr.responseText);
            }
        });
    }

    function btnModalDetailTransaksi(url) {
        console.log("Fetching data from URL:", url);

        if (!url) {
            console.error("URL is null or undefined.");
            return;
        }

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            cache: false, // Nonaktifkan cache
            success: function(response) {
                console.log("Full data received:", response);

                let tbodyContent = ``;

                if (response && response.data) {
                    let item = response.data;
                    tbodyContent = `
                        <tr>
                            <td class="text-center">1</td>
                            <td>${item.name ?? 'N/A'}</td>
                            <td>${item.email ?? 'N/A'}</td>
                            <td>Rp ${number_format(item.price, 0, ',', '.')}</td>
                            <td class="text-center">${item.phone ?? 'N/A'}</td>
                            <td class="text-center">${item.service_type ?? 'N/A'}</td>
                            <td>${item.description ?? 'N/A'}</td>
                        </tr>
                    `;
                } else {
                    console.error("Unexpected data structure:", response);
                    tbodyContent = `
                        <tr>
                            <td colspan="7" class="text-center">No data available</td>
                        </tr>
                    `;
                }

                console.log("Generated tbody content:", tbodyContent);

                $('#trbody').html(tbodyContent);
                $('#modalDetailTransaksi').modal('show');
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
                console.error("Response Text:", xhr.responseText);
            }
        });
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>
@endpush