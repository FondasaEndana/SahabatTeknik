/* Fungsi formatRupiah */
function babengRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function rupiah(angka){
    var	number_string = angka.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return rupiah;

}

function babengalert(inputIcon='info',InputTitle='Alert!'){
    Swal.fire({
        icon: inputIcon,
        title: InputTitle,
        // text: 'Something went wrong!',
        showConfirmButton: true,
        timer: 1000
    })
}

function tanggalindo(inputan='2022-11-01'){
    //inputan = tahun-bln-tgl
    let data=inputan.split("-");
    let tahun=data[0];
    var bulan=data[1];
    let tanggal=data[2];
    if(bulan==1||bulan=="01"){
        bulan='Januari';
    }else if(bulan==2||bulan=="02"){
        bulan='Februari';
    }else if(bulan==3||bulan=="03"){
        bulan='Maret';
    }else if(bulan==4||bulan=="04"){
        bulan='April';
    }else if(bulan==5||bulan=="05"){
        bulan='Mei';
    }else if(bulan==6||bulan=="06"){
        bulan='Juni';
    }else if(bulan==7||bulan=="07"){
        bulan='Juli';
    }else if(bulan==8||bulan=="08"){
        bulan='Agustus';
    }else if(bulan==9||bulan=="09"){
        bulan='September';
    }else if(bulan==10){
        bulan='Oktober';
    }else if(bulan==11){
        bulan='November';
    }else if(bulan==12){
        bulan='Desember';
    }
    //    console.log(bulan);
    var	hasil = tanggal+" "+bulan+""+tahun;
    return hasil;
}
