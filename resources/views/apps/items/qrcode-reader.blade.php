<!-- Begin Page Content -->
@extends('apps.layouts.main')

@section('container')
    <!-- Content Row -->
    {{-- Form input daftar barang --}}
    <div class="row mx-1">
        <div class="card shadow col m-0 p-0">
            <div class="card-header font-weight-bold text-black">
                Scan QR COde
            </div>
                <div class="card-body">
                    <div id="reader" width="600px"></div>
                </div>
            </div>
    </div>
@endsection
<!-- /.container-fluid -->