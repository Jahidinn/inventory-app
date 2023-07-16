<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Content Row -->
    {{-- Form input daftar barang --}}
    <div class="row mx-1">
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Tambah daftar barang baru
            </div>
            <div class="card-body">
                <form method="post" action="/apps/items">
                    @csrf
                    {{-- Form Nama barang --}}
                    <div class="form-group">
                      <label for="name">Nama barang</label>
                      <input type="text" class="form-control input-slug @error('name') is-invalid @enderror" placeholder="Masukan nama barang" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Form Kode barang --}}
                    <div class="form-group">
                      <label for="item_id">Kode barang</label>
                      <input type="text" class="form-control input-slug @error('item_id') is-invalid @enderror" placeholder="Contoh : BRG20" id="item_id" name="item_id" value="{{ old('item_id') }}" required>
                        @error('item_id')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Form Kategori dan satuan barang --}}
                    <div class="row">
                        <div class="col">
                            <label for="category_id">Kategori barang</label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option value="">Pilih...</option>
                                @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="invalid-veedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                          <label for="name">Ukuran / Satuan</label>
                          <label for="measuring_unit_id"></label>
                            <select id="measuring_unit_id" class="form-control" name="measuring_unit_id">
                                <option value="" selected>Pilih...</option>
                                
                                @foreach ($units as $unit)
                                @if (old('measuring_unit_id') == $unit->id)
                                <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
                                @else
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endif
                                @endforeach

                            </select>
                            @error('measuring_unit_id')
                            <div class="invalid-veedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Form Harga barang barang --}}
                    <div class="form-group mt-3">
                        <label for="price">Harga barang</label>
                        <input type="text" class="form-control input-slug @error('price') is-invalid @enderror" placeholder="Rp 1234" id="dengan-rupiah" name="price" value="{{ old('price') }}" required>
                          @error('price')
                          <div class="invalid-veedback text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    {{-- Form Deskripsi barang barang --}}
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control input-slug @error('description') is-invalid @enderror" placeholder="Keterangan" id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-veedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah barang</button>
                </form>

            </div>
            </div>
    </div>
@endsection
<!-- /.container-fluid -->