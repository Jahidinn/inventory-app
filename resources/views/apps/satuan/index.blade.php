<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen satuan barang</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-1" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
    @endif
    <div class="row mx-1">
        
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Daftar satuan barang
            </div>
            <div class="card-body">
                <a href="/apps/satuan/create" class="btn btn-success mb-2"> <i class="fas fa-plus"></i> Tambah satuan</a>
                <div class="table-responsive">
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama satuan</th>
                    <th scope="col" style="min-width: 125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuan_barang as $satuan)
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $satuan->name }}</td>
                    <td >
                        {{-- <a href="/apps/satuan/{{ $satuan->category_id }}" class="badge px-2 bg-info text-white"><i class="far fa-eye"></i></a> --}}
                        <a href="/apps/units/{{ $satuan->unit_id }}/edit" class="badge px-2 bg-success text-white"><i class="far fa-edit"></i></a>
                        <form action="/apps/units/{{ $satuan->unit_id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge px-2 bg-danger text-white border-0" onclick="return confirm('Are you sure?')"><i class="far fa-times-circle"></i></button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    <tr>
                </tbody>
                </table>
                </div>
            </div>
            </div>
    </div>

@endsection
<!-- /.container-fluid -->