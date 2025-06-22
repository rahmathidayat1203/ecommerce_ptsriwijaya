@extends('layouts.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
                <a class="btn btn-success" href="{{ route('pengirimans.create') }}">Create New pengirimans</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Pengiriman</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered data-table" id="pengiriman-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Order</th>
                            <th>Alamat Pengiriman</th>
                            <th>Metode Pengiriman</th>
                            <th>Status Pengiriman</th>
                            <th>Nomor Perjalanan</th>
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
            $('#pengiriman-table').DataTable({
                scrollX: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengirimans.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_order',
                        name: 'id_order'
                    },
                    {
                        data: 'alamat_pengiriman',
                        name: 'alamat_pengiriman'
                    },
                    {
                        data: 'metode_pengiriman',
                        name: 'metode_pengiriman'
                    },
                    {
                        data: 'status_pengiriman',
                        name: 'status_pengiriman'
                    },
                    {
                        data: 'nomor_perjalanan',
                        name: 'nomor_perjalanan'
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
