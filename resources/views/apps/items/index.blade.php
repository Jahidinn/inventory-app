<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen barang</h1>
        <div>
            <a href="/export-pdf" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Export PDF</a>

            {{-- <a href="/export-excel" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export EXCL</a> --}}

            <a href="/export-excel/5" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export EXCL</a>
            <a href="/excel-export" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export EXCL2</a>
        </div>
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
                Daftar barang
            </div>
            <div class="card-body">
                <a href="/apps/items/create" class="btn btn-success mb-2"> <i class="fas fa-plus"></i> Tambah barang</a>
                <form action="" method="get">
                    <div class="form-row">
                        <div class="form-group col">
                          <input type="text" class="form-control" name="keyword" placeholder="Cari data .." value="{{ request('keyword'); }}">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="category_id">
                            <option value="">Semua</option>
                            @foreach ($categories as $category)
                            @if (request('category_id') == $category->category_id)
                            <option value="{{ $category->category_id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
    
                          </select>
                        </div> 
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-search"></i> Cari</button>
                        </div>
                      </div>
                </form>
                <div class="table-responsive">
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kode</th>
                    <th scope="col" style="min-width: 125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $keys => $item)
                    <th scope="row">{{$items->firstItem() + $keys }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->item_id }}</td>
                    <td >
                        <a href="/apps/items/{{ $item->item_id }}" class="badge px-2 bg-info text-white"><i class="far fa-eye"></i></a>
                        <a href="/apps/items/{{ $item->item_id }}/edit" class="badge px-2 bg-success text-white"><i class="far fa-edit"></i></a>
                        <form action="/apps/items/{{ $item->item_id }}" method="post" class="d-inline">
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
                <div class="d-flex justify-content-center">
                    {{ $items->withQueryString()->links() }}
                </div>
                </div>
            </div>
            </div>
    </div>

@endsection
<!-- /.container-fluid -->