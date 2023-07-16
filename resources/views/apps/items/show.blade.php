<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Content Row -->
    {{-- Form input daftar barang --}}
    <div class="row mx-1">
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Detail barang
            </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        Kode barang : <strong class="bg-success text-white p-1"> {{ $item_detail->item_id }} </strong>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <th scope="col" class="item-detail-table-left">Nama <span class="float-right">:</span></th>
                                <td scope="col" class="item-detail-table-right">{{ $item_detail->name }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Kategori <span class="float-right">:</span></th>
                                <td>{{ $item_detail->category->name }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Satuan/ukuran <span class="float-right">:</span></th>
                                <td>{{ $item_detail->unit->name }}</td>
                              </tr>
                              <tr>
                                <th scope="row">Harga <span class="float-right">:</span></th>
                                <td>Rp {{ number_format($item_detail->price,0,',','.') }}
                              <tr>
                                <th scope="row">Deskripsi <span class="float-right">:</span></th>
                                <td>{{ $item_detail->description }}</td>
                              </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
    </div>
@endsection
<!-- /.container-fluid -->