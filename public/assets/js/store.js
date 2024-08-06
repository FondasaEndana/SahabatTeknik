function refreshDataRestok() {
    let getData = storeGetProduk();
    if (getData) {
        let data = getData.map(function(el, index) {
            return `<tr>
                <td class="text-center">${index + 1}</td>
                <td class="text-center babeng-min-row">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus data ini? Y/N') ? storeHapusData(${el.id}) : ''"><span class="pcoded-micon"><i class="fa-solid fa-trash-can"></i></span></button>
                    <button class="btn btn-warning btn-sm" onclick="storeBtnOpenModalEdit(${el.id}, ${index})" data-bs-toggle="modal" data-bs-target="#formModalEdit"><span class="pcoded-micon"><i class="fa-solid fa-pen-to-square"></i></span></button>
                </td>
                <td>${el.nama}</td>
                <td>Rp ${rupiah(el.harga_jual)},00</td>
                <td>Rp ${rupiah(el.harga_beli)},00</td>
                <td class="text-center">${el.jumlah}</td>
                <td class="text-center">Rp ${rupiah(el.total)},00</td>
            </tr>`;
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

// Function to get products from localStorage
function storeGetProduk() {
    let getData = JSON.parse(localStorage.getItem('restokItems'));
    return getData;
}

// Function to add product to localStorage
function storeProduk(id = null, nama = null, harga_jual = null) {
    var dataTemp = {
        id: id,
        nama: nama,
        harga_jual: harga_jual,
        harga_beli: harga_jual,
        jumlah: 0,
        total: 0,
    };
    let getData = storeGetProduk();
    if (getData != null) {
        if (storePeriksa(dataTemp.id) < 1) {
            getData.push(dataTemp);
            localStorage.setItem('restokItems', JSON.stringify(getData));
            console.log('Data berhasil ditambahkan');
        }
    } else {
        if (storePeriksa(dataTemp.id) < 1) {
            localStorage.setItem('restokItems', JSON.stringify([dataTemp]));
            console.log('Data berhasil dibuat');
            storeGetProduk();
        }
    }
    refreshDataRestok();
}

// Function to check if product exists in localStorage
function storePeriksa(id = null) {
    let getData = storeGetProduk();
    if (getData != null) {
        var periksa = getData.filter(function(el) {
            return el.id == id;
        });
        return periksa.length;
    } else {
        return 0;
    }
}

// Function to delete product from localStorage
function storeHapusData(id = null) {
    let getData = storeGetProduk();
    if (getData != null) {
        let jmlData = getData.length;
        for (let i = 0; i < jmlData; i++) {
            if (getData[i].id == id) {
                getData.splice(i, 1);
                localStorage.setItem('restokItems', JSON.stringify(getData));
                refreshDataRestok();
            }
        }
    }
}

// Function to open edit modal and populate it with product data
function storeBtnOpenModalEdit(id = null, index = null) {
    let getData = storeGetProduk();
    $('#formModalEdit').on('shown.bs.modal', function() {
        $('#inputNamaProduk').val(getData[index].nama);
        $('#inputHargaBeli').val(getData[index].harga_beli);
        $('#inputJumlah').val(getData[index].jumlah);
        $('#inputJumlah').focus();
    });
    let footerModalEdit = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="storeBtnApplyModalEdit(${index})">Apply</button>`;
    $('#btnApplyModalEdit').html(footerModalEdit);
}

// Function to apply changes made in the edit modal
function storeBtnApplyModalEdit(index = null) {
    let getData = storeGetProduk();
    getData[index].jumlah = $('#inputJumlah').val();
    getData[index].harga_beli = $('#inputHargaBeli').val();
    getData[index].total = $('#inputJumlah').val() * $('#inputHargaBeli').val();
    localStorage.setItem('restokItems', JSON.stringify(getData));
    $('#formModalEdit').modal('hide');
    refreshDataRestok();
}

// Function to search and display products
function storeCariData(inputancari = '', inputanUrl = '#') {
    let contentResponse = '';
    let datas = null;
    $.ajax({
        url: inputanUrl,
        type: "GET",
        data: {
            cari: inputancari
        },
        success: function(response) {
            datas = response.data;
            let jmlDataResponse = datas.length;
            for (let i = 0; i < jmlDataResponse; i++) {
                contentResponse += `
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <div class="card border-0 bg-white text-center p-1">
                        <img src="${datas[i].img}" class="thumbnail img-responsive" style="display: block; max-width: 100%; height: 200px; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">${datas[i].nama}</h5>
                            <p class="card-text">Harga: Rp ${rupiah(datas[i].harga_jual)},00</p>
                            <button class="btn btn-info addProduk" onclick="storeProduk(${datas[i].id}, '${datas[i].nama}', ${datas[i].harga_jual})">Add</button>
                        </div>
                    </div>
                </div>`;
            }
            $('#contentCari').html(contentResponse);
        }
    });
}

// Function to reset all data in localStorage
function resetData() {
    console.log('Reset All data');
    localStorage.clear();
    refreshDataRestok();
}