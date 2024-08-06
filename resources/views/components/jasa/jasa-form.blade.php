<div>
    <form id="setting-form" method="POST" action="{{$item?route('admin.jasa.update',$item->id):route('admin.jasa.store')}}">
    @php
    // Declare variables
    $name = '';
    $email = '';
    $phone = '';
    $service_type = '';
    $description = '';
    $price = '';
@endphp
@if ($item)
    @method('put')
    @php
        // Initialize variables when $item is not null
        $name = $item->name;
        $email = $item->email;
        $phone = $item->phone;
        $service_type = $item->service_type;
        $description = $item->description;
        $price = $item->price;
    @endphp
@endif
        @csrf
        <div class="row py-2 px-2">
            <div class="form-group row align-items-center py-2">
                <label for="name" class="form-control-label col-sm-3 text-md-right">Nama </label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') ? old('name') : $name }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="email" class="form-control-label col-sm-3 text-md-right">Email </label>
                <div class="col-sm-6 col-md-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') ? old('email') : $email }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="phone" class="form-control-label col-sm-3 text-md-right">Nomor HP </label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ old('phone') ? old('phone') : $phone }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="service_type" class="form-control-label col-sm-3 text-md-right">Tipe Service </label>
                <div class="col-sm-6 col-md-9">
                    <select class="form-control @error('service_type') is-invalid @enderror" name="service_type" required>
                        <option value="">Pilih Tipe Servis</option>
                        <option value="servis komputer" {{ old('service_type', $service_type) == 'servis komputer' ? 'selected' : '' }}>Servis Komputer</option>
                        <option value="servis laptop" {{ old('service_type', $service_type) == 'servis laptop' ? 'selected' : '' }}>Servis Laptop</option>
                        <option value="instalasi software" {{ old('service_type', $service_type) == 'instalasi software' ? 'selected' : '' }}>Instalasi Software</option>
                        <option value="instalasi hardware" {{ old('service_type', $service_type) == 'instalasi hardware' ? 'selected' : '' }}>Instalasi Hardware</option>
                    </select>
                    @error('service_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="description" class="form-control-label col-sm-3 text-md-right">Deskripsi Kerusakan / Instalasi</label>
                <div class="col-sm-6 col-md-9">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') ? old('description') : $description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row align-items-center py-2">
                <label for="price" class="form-control-label col-sm-3 text-md-right">Total Harga Jasa</label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" required value="{{ old('price') ? old('price') : $price }}">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between flex-row-reverse">
                <button class="btn btn-primary" id="save-btn">Simpan</button>
            </div>
        </div>
    </form>
</div>