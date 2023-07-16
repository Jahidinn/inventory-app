<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Content Row -->
    {{-- Form input daftar barang --}}
    <div class="row mx-1">
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Edit satuan : {{ $satuan_barang->name }}
            </div>
            <div class="card-body">
                <form method="post" action="/apps/units/{{ $satuan_barang->unit_id }}">
                    @method('put')
                    @csrf
                    {{-- Form Nama barang --}}
                    <div class="form-group">
                      <label for="name">Satuan barang</label>
                      <input type="text" class="form-control input-slug nama-kategori @error('name') is-invalid @enderror" placeholder="Masukan satuan barang" id="name" name="name" value="{{ old('name', $satuan_barang->name) }}" required>
                        @error('name')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Form Kode barang --}}
                    <div class="form-group">
                      <label for="unit_id">ID satuan (otomatis)</label>
                      <input type="text" class="form-control input-slug kategori-id @error('unit_id') is-invalid @enderror" placeholder="Auto fill" id="unit_id" name="unit_id" value="{{ old('unit_id', $satuan_barang->unit_id) }}" required readonly>
                        @error('unit_id')
                        <div class="invalid-veedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Edit satuan</button>
                </form>

            </div>
        </div>
    </div>
@endsection
<!-- /.container-fluid -->