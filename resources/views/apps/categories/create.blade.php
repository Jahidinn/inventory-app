<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Content Row -->
    {{-- Form input daftar barang --}}
    <div class="row mx-1">
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Tambah kategori barang baru
            </div>
            <div class="card-body">
                <form method="post" action="/apps/categories">
                    @csrf
                    {{-- Form Nama barang --}}
                    <div class="form-group">
                      <label for="name">Nama kategori</label>
                      <input type="text" class="form-control input-slug nama-kategori @error('name') is-invalid @enderror" placeholder="Masukan nama kategori" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Form Kode barang --}}
                    <div class="form-group">
                      <label for="category_id">ID kategori (otomatis)</label>
                      <input type="text" class="form-control input-slug kategori-id @error('category_id') is-invalid @enderror" placeholder="Auto fill" id="category_id" name="category_id" value="{{ old('category_id') }}" required readonly>
                        @error('category_id')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah kategori</button>
                </form>

            </div>
            </div>
    </div>
@endsection
<!-- /.container-fluid -->