@extends('layouts.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
                <a class="btn btn-success" href="{{ route('orders.create') }}">Create New Order</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Order</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered data-table" id="order-table">
                    <thead class="table-light">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembeli</th>
                            <th>Produk</th>
                            <th>Total Pembelian</th>
                            <th>Status</th>
                            <th>Tanggal Pembelian</th>
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
            $('#order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('orders.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_pembeli',
                        name: 'id_pembeli'
                    },
                    {
                        data: 'id_produk',
                        name: 'id_produk'
                    },
                    {
                        data: 'total_pembelian',
                        name: 'total_pembelian'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'tanggal_pembelian',
                        name: 'tanggal_pembelian'
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
