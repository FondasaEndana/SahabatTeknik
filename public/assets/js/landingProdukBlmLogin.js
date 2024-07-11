function refreshDataRestok() {
    let getData = storeGetProduk();
    // console.log(getData);
    if (getData) {
        let data = getData.map(function (el, index) {
            return `<tr >
        <td class="text-center">${index + 1}</td>
        <td class="text-center babeng-min-row">
        <button class="btn btn-danger btn-sm" onclick="return  confirm('Anda yakin menghapus data ini? Y/N') ?storeHapusData(${el.id}):''"><span
        class="pcoded-micon"> <i class="fa-solid fa-trash-can"></i></span></button>

        <button class="btn btn-warning btn-sm" onclick="storeBtnOpenModalEdit(${el.id},${index})" data-bs-toggle="modal" data-bs-target="#formModalEdit"><span
        class="pcoded-micon"> <i class="fa-solid fa-pen-to-square"></i></span></button>
        </td>
        <td>${el.nama}</td>
        <td>Rp ${rupiah(el.harga_terjual)},00 / Stok : ${el.stok}</td>
        <td class="text-center">${el.jumlah}</td>
        <td class="text-center">Rp ${rupiah(el.total)},00</td>
        </tr>`
        }).join('');
        document.querySelector('#trbody').innerHTML = data;
        $('#cart').val(JSON.stringify(getData));
        let sumtotalbayar = getData.map(item => item.total).reduce((prev, next) => prev + next);
        $('#totalbayar').val('Rp ' + rupiah(sumtotalbayar));
    } else {
        document.querySelector('#trbody').innerHTML = '';
        $('#cart').val('');
        $('#totalbayar').val(0);
    }
}

function storeGetProduk() {
    let getData = JSON.parse(localStorage.getItem('transaksiItems'));
    // console.log(getData);
    return getData;
}
function storeProduk(id = null, nama = null, harga_jual = null, stok = null, terjual = null, stoktersedia = null) {
    var dataTemp = {
        id: id,
        nama: nama,
        harga_asli: harga_jual,
        harga_terjual: harga_jual, //
        stok: stok,
        // terjual:terjual,
        // stoktersedia:stoktersedia,
        jumlah: 0,
        total: 0,
        inputTerjual: 0,
    }
    //ambilDataLocalStorage
    //ubah menjadi array and object
    let getData = storeGetProduk();
    if (getData != null) {
        //jika data tidak ditemukan maka tambahkan ke localstorage
        if (storePeriksa(dataTemp.id) < 1) {
            // console.log(getData);
            getData.push(dataTemp);
            //tambahkan dataTemp ke array
            //store data ke local storage
            localStorage.setItem('transaksiItems', JSON.stringify(getData));
            console.log('Data berhasil di tambahkan');
        }
    } else {
        if (storePeriksa(dataTemp.id) < 1) {
            localStorage.setItem('transaksiItems', JSON.stringify([dataTemp]));
            console.log('Data berhasil di dibuat');
            storeGetProduk();
        }
    }
    babengalert('success', 'Data berhasil di tambahkan!');
    // console.log(storePeriksa(id));
    refreshDataRestok();
}


function storePeriksa(id = null) {
    let getData = storeGetProduk();
    if (getData != null) {
        var periksa = getData.filter(function (el) {
            return el.id == id;
        })
        // console.log(periksa.length);
        return periksa.length
    } else {
        // console.log(0);
        return 0
    }
}
function storeHapusData(id = null) {
    let getData = storeGetProduk();
    if (getData != null) {
        let jmlData = getData.length;
        for (let i = 0; i < jmlData; i++) {
            // console.log(getData[i].id);
            if (getData[i].id == id) {
                getData.splice(i, 1);
                localStorage.setItem('transaksiItems', JSON.stringify(getData));
                //     console.log(getData);
                // console.log('Data berhasil di hapus',getData);
                babengalert('warning', 'Data berhasil di hapus!');
                refreshDataRestok();
            }
        }
    }
}


function storeBtnOpenModalEdit(id = null, index = null) {
    let footerModalEdit = '';
    // console.log(id,index);
    let getData = storeGetProduk();
    // console.log(getData);
    // $('#formModalEdit').on('shown.bs.modal', function () {
    //     // $('#myInput').trigger('focus')
    //     console.log('Modal trigger');
    //   })
    $('#formModalEdit').on('shown.bs.modal', function () {
        $('#inputNamaProduk').val(getData[index].nama);
        // $('#inputHargaAsli').val(`${rupiah(getData[index].harga_asli)} / Stok : ${getData[index].stok}`);
        // $('#inputTerjual').val(`${rupiah(getData[index].harga_terjual)} / Stok : ${getData[index].stok}`);
        $('#inputTerjual').val(getData[index].harga_terjual);
        $('#inputStokTersedia').val(getData[index].stok);
        // $('#inputTerjual').val(getData[index].harga_terjual);
        $('#inputJumlah').val(getData[index].jumlah);
        $('#inputJumlah').prop('max', getData[index].stok);
        $('#inputJumlah').focus();
        // console.log($(this).attr("max"),getData[index].stok);
        if (getData[index].stok == 0) {
            $('#inputJumlah').prop("disabled", true);
        } else {
            $('#inputJumlah').prop("disabled", false);
        }
        $('#inputJumlah').keyup(function () {
            // console.log($(this).attr("max"));
            if ($(this).val() > parseInt($(this).attr("max")) || $(this).val() == '' || $(this).val() == null || $(this).val() == 0) {
                //    console.log('stok tidak cukup');
                $('#inputJumlah').addClass('is-invalid ');
                footerModalEdit = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>`;
            } else {
                $('#inputJumlah').removeClass('is-invalid ');
                footerModalEdit = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary" onclick="storeBtnApplyModalEdit(${index})">Apply</button>`;
            }

            $('#btnApplyModalEdit').html(footerModalEdit);
        });
    });
    footerModalEdit = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    `;
    $('#btnApplyModalEdit').html(footerModalEdit);
}

function storeBtnApplyModalEdit(index = null) {
    let getData = storeGetProduk();
    getData[index].jumlah = $('#inputJumlah').val();
    getData[index].inputTerjual = $('#inputTerjual').val();
    getData[index].total = $('#inputJumlah').val() * $('#inputTerjual').val();
    // console.log(index,getData[index].jumlah,getData[index].harga_beli,getData[index].total);
    localStorage.setItem('transaksiItems', JSON.stringify(getData));
    $('#formModalEdit').modal('hide');
    // $('.close').click();
    refreshDataRestok();

}

function storeCariData(inputancari = '', inputanUrl = '#') {
    let contentResponse = '';
    let datas = null;
    //fetch data example
    $.ajax({
        url: inputanUrl,
        type: "GET",
        data: {
            cari: inputancari
        },
        success: function (response) {
            // console.log(response.data);
            datas = response.data;
            let jmlDataResponse = datas.length;
            for (let i = 0; i < jmlDataResponse; i++) {
                contentResponse += `
<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
<div class="card border-0 bg-white text-center p-1" >
<img src="${datas[i].img}" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 200px;object-fit: cover">
<div class="card-body">
<h5 class="card-title">${datas[i].nama}</h5>
<p class="card-text">Harga : Rp ${rupiah(datas[i].harga_jual)},00</p>
<p class="card-text">Stok :  ${datas[i].stoktersedia}</p>`;

                contentResponse += `<a href="produk/${datas[i].slug}"  class="mb-2 ml-2 btn btn-primary addProduk">Detail</a>`;
                if (datas[i].stoktersedia > 0) {
                    contentResponse += `<button  class="btn btn-${datas[i].stoktersedia < 1 ? 'dark' : 'light'} addProduk " >Tambahkan ke Keranjang</button>`;
                } else {
                    contentResponse += `<button  class="btn btn-${datas[i].stoktersedia < 1 ? 'dark' : 'light'} addProduk" onclick="return  confirm('Stok Habis!')">Tambahkan Keranjang</button>`;

                }

                contentResponse += `</div>
</div>
</div>
`;
            }
            $('#contentCari').html(contentResponse);
        }
    });

}
function resetData() {
    console.log('Reset All data');
    localStorage.clear();
    refreshDataRestok();
    // reload();
}
