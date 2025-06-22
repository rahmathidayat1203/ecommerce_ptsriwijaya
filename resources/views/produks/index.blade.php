@extends('layouts.layouts')

@section('content')
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Daftar Produk</h4>
                <a class="btn btn-success" href="{{ route('produks.create') }}">+ Tambah Produk</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover w-100" id="produk-table">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <!-- Pastikan sudah include jQuery dan DataTables JS di layout -->
        <script type="text/javascript">
            $(function() {
                $('#produk-table').DataTable({
                    scrollX: true,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('produks.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'id_kategori',
                            name: 'id_kategori'
                        },
                        {
                            data: 'nama_produk',
                            name: 'nama_produk'
                        },
                        {
                            data: 'harga',
                            name: 'harga'
                        },
                        {
                            data: 'diskon',
                            name: 'diskon'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                        {
                            data: 'foto',
                            name: 'foto'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            });
        </script>
    @endpush
