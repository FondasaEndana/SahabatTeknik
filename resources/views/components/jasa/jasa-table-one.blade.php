<div>
    <x-babeng.table-one>
        <x-slot name="thead">
            <th class="babeng-min-row text-center">No</th>
            <th class="text-center">Aksi</th>
            <th>Nama</th>
            <th class="text-center">Total Harga Jasa</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Nama Service</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr>
                    <td class="text-center">{{$loop->index + 1}}</td>
                    <td class="babeng-min-row">
                        <x-btnedit link="{{route('admin.jasa.edit', $item->id)}}"></x-btnedit>
                        <x-btndelete link="{{route('admin.jasa.destroy', $item->id)}}"></x-btndelete>
                    </td>
                    <td>{{$item->name}}</td>
                    <td class="babeng-min-row text-center">Rp {{ number_format($item->price, 2, ',', '.') }}</td>
                    <td class="babeng-min-row text-center">{{$item->phone}}</td>
                    <td class="babeng-min-row text-center">{{$item->service_type}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No data available</td>
                </tr>
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>
