<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th>Nama</th>
              <th class="babeng-min-row text-center">Kode</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btnedit link="{{route('admin.label.edit',$item->id)}}"></x-btnedit>
                    <x-btndelete link="{{route('admin.label.destroy',$item->id)}}"></x-btndelete>
                </td>
                <td>{{$item->nama}}</td>
                <td><span class="badge bg-label-primary me-1">{{$item->kode}}</span></td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>