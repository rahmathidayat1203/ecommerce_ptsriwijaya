@extends('layouts.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
                <a class="btn btn-success" href="{{ route('kategoris.create') }}">Create New Kategoris</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Kategori</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered data-table" id="kategori-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
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
            $('#kategori-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kategoris.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_kategori',
                        name: 'nama_kategori'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
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
