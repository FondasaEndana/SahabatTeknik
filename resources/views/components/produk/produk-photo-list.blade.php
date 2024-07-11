<div>
    <!-- Be present above all else. - Naval Ravikant -->

    <div class="row px-4 py-2 flex">
        @php
            $photo_old='https://ui-avatars.com/api/?name=00&color=7F9CF5&background=EBF4FF';
            $getPhotoList=\App\Models\image::where('parrent_id',$item->id)->where('prefix','produk')->get();
        @endphp
        @forelse ($getPhotoList as $img)
        @php
             $photo_old=url('/').'/'.$img->photo;
        @endphp
        <div class="col-6 col-lg-3 flex ">
            <div class="card bg-white text-center p-1 content-center " >
            <img id="frame" src="{{$photo_old}}" class="card border-1 w-px-200 h-auto mb-2"  style="display: block;max-width: 100%;height: 200px;object-fit: cover" />
            <div>
                <form method="POST" action="{{ route('admin.produk.uploadphoto.destroy',$img->id) }}">
                    @csrf
                    @method('delete')
                <button class=" border-1 btn btn-sm btn-danger"  onclick="return  confirm('Anda yakin menghapus data ini? Y/N')">

                    <i class="fa-regular fa-trash-can"></i>
                    <span class="align-middle">Hapus</span>
                </button>
        </form>
            </div>

            </div>
        </div>
        @empty

        @endforelse
      </div>
</div>
