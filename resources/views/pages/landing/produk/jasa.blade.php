@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')
@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}" />
@endif
@endpush

@section('content')
<section class="section section-lg pb-0" id="services">
    <div class="container">
        <div class="container mt-5">
            @if(Auth::check())
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="service-box">
                        <h2 class="display-4 mb-4 text-center animate__animated animate__fadeInDown">Formulir Pengajuan Jasa</h2>
                        <form action="{{ route('jasa.store') }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="service_type">Jenis Layanan</label>
                                <select class="form-control" id="service_type" name="service_type" required>
                                    <option value="">Pilih Layanan</option>
                                    <option value="Servis Komputer">Servis Komputer</option>
                                    <option value="Servis Laptop">Servis Laptop</option>
                                    <option value="Instalasi Software">Instalasi Software</option>
                                    <option value="Instalasi Hardware">Instalasi Hardware</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Masalah</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="terms">
                                    <input type="checkbox" id="terms" name="terms" required>
                                    Saya telah membaca dan menyetujui <a href="#" data-toggle="modal" data-target="#termsModal" class="terms-link">Syarat & Ketentuan</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="alert alert-warning">
                        Anda harus Login untuk melakukan pengajuan jasa.
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-light">
                <h5 class="modal-title" id="termsModalLabel">Syarat & Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>1.</strong> Garansi tidak berlaku untuk software dan kerusakan fisik seperti pecah, tergores, terbakar, korosi, cairan, akibat hewan dan kesalahan pemakaian serta force majeure.</li>
                    <li class="list-group-item"><strong>2.</strong> Garansi tidak mencakup penggantian unit baru atau pengembalian uang.</li>
                    <li class="list-group-item"><strong>3.</strong> Syarat klaim garansi wajib menyertakan kuitansi/nota pembelian serta segel tidak rusak/tidak ada tanda pembongkaran yang dilakukan tanpa sepengetahuan staf kami.</li>
                    <li class="list-group-item"><strong>4.</strong> Pemeriksaan kerusakan diperkirakan dalam waktu <strong>3 (tiga) sampai dengan 5 (lima) hari kerja.</strong></li>
                    <li class="list-group-item"><strong>5.</strong> Untuk kasus unit mati total/layar rusak tidak bisa dijamin komponen lainnya berfungsi normal. Jika ditemukan komponen lainnya sudah rusak dari sebelum datang.</li>
                    <li class="list-group-item"><strong>6.</strong> Untuk kasus unit masuk terkena air, wajib melalui proses servis pembersihan dan pengeringan. Proses pengeringan dan pembersihan akan dikenakan biaya, setelah itu baru bisa dicek komponen mana saja yang rusak dan perlu diganti.</li>
                    <li class="list-group-item"><strong>7.</strong> Konfirmasi biaya <strong>BACK UP DATA, PERBAIKAN dan PENGGANTIAN SPARE PART</strong> akan diinformasikan terlebih dahulu sebelum pengerjaan.</li>
                    <li class="list-group-item"><strong>8.</strong> Pengambilan Unit Wajib Menyerahkan Tanda Terima Servis.</li>
                    <li class="list-group-item"><strong>9.</strong> Ada beberapa kerusakan yang baru bisa diketahui setelah pengerjaan servis atau pengecekan, untuk itu kerusakan lain yang ditemukan akan dikenakan biaya tambahan dengan persetujuan pelanggan.</li>
                    <li class="list-group-item"><strong>10.</strong> Apabila konfirmasi tidak dilakukan selang lebih dari <strong>14 (empat belas)</strong> hari kerja, maka perbaikan dianggap batal.</li>
                    <li class="list-group-item"><strong>11.</strong> Jika servis dibatalkan, unit yang sudah dikerjakan ada kemungkinan tidak bisa kembali seperti semula dan bisa terjadi lecet bekas pembongkaran.</li>
                    <li class="list-group-item"><strong>12.</strong> Pembatalan transaksi perbaikan akan dikenakan biaya pemeriksaan.</li>
                    <li class="list-group-item"><strong>13.</strong> Jika suku cadang yang dibawa oleh pelanggan sendiri maka tidak ada garansi dan jaminan akan berfungsi, kami hanya menjamin jasa pemasangan.</li>
                    <li class="list-group-item"><strong>14.</strong> Jika service sudah selesai ataupun cancel, admin sudah konfirmasi ke customer, namun barang tidak diambil dalam tempo lebih dari satu bulan maka jika ada kerusakan ataupun hilang diambil alih pelanggan. Keluhan terhadap kondisi dan kelengkapan unit setelah meninggalkan gerai kami tidak dapat dilayani kembali.</li>
                    <li class="list-group-item"><strong>15.</strong> Kami tidak bertanggung jawab atas unit perbaikan yang tidak diambil dalam jangka waktu 3 (tiga) bulan semenjak unit selesai diperbaiki.</li>
                    <li class="list-group-item"><strong>16.</strong> Pelanggan wajib memeriksa kembali kondisi unit dan kelengkapan saat pengambilan. Keluhan terhadap kondisi dan kelengkapan unit setelah meninggalkan gerai kami tidak dapat dilayani kembali.</li>
                    <li class="list-group-item"><strong>17.</strong> Lembar ini merupakan bukti pengambilan unit dan harap disimpan dengan baik. Segala resiko yang diakibatkan oleh hilangnya lembar ini adalah diluar tanggung jawab kami.</li>
                    <li class="list-group-item"><strong>18.</strong> Pelanggan yang menandatangani lembar ini telah memahami dan menyetujui syarat dan ketentuan di atas.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('before-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/assets/js/babeng.js') }}"></script>
<script src="{{ asset('/assets/js/landingProduk.js') }}"></script>
<script>
    function validateForm() {
        var form = document.querySelector('form');
        if (!form.checkValidity()) {
            // If form is not valid, show native HTML5 validation
            form.reportValidity();
            return false;
        }

        if (!document.getElementById('terms').checked) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                text: 'Anda harus menyetujui Syarat & Ketentuan sebelum mengirim pengajuan jasa.',
                confirmButtonText: 'OK'
            });
            return false;
        }
        return true;
    }
</script>
@endpush

<style>
    .terms-link {
        color: #007bff;
        font-weight: bold;
        text-decoration: underline;
    }

    .terms-link:hover {
        color: #0056b3;
    }

    .service-box {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: left;
    }

    .service-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        background-color: #183b56;
        color: #fff;
    }

    .modal-header .close {
        color: #fff;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #dee2e6;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .service-box {
            text-align: left;
        }
    }
</style>
