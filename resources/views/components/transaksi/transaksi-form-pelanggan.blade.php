<div>
    <x-babeng.table-two>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th>Nama</th>
              <th>Harga </th>
              <th class="text-center babeng-min-row">Berat</th>
              <th class="text-center babeng-min-row">Jumlah</th>
              <th class="text-center">Total Harga</th>
        </x-slot>
        <x-slot name="tbody">
            @push('before-script')
            <script>
$(function () {
    refreshDataRestok();
//proses declar to table
// let dataTable=null;
// var getDatas = storeGetProduk();
// let jmlData = getDatas.length;
// // console.log(jmlData);
// if(getDatas){
//     for(let i=0;i<jmlData;i++){
//         dataTable+=`
//             <tr>
//                 <td class=" text-center">${i+1}</td>
//                 <td class="babeng-min-row">
//                 </td>
//                 <td>${getDatas[i].nama}</td>
//                 <td>Rp ${rupiah(getDatas[i].harga_jual)},00</td>
//                 <td>Rp ${rupiah(getDatas[i].harga_beli)},00</td>
//                 <td class="text-center">${getDatas[i].jumlah}</td>
//                 <td class="text-center">${getDatas[i].total}</td>
//             </tr>`;
//     }
// }

// $('#trbody').html(dataTable);
});
            </script>
            @endpush
        <tbody class="table-border-bottom-0" id="trbody">
        </tbody>
        </x-slot>
    </x-babeng.table-two>
</div>
