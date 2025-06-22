@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Role Management</h2>
            @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}">
                    <i class="bi bi-plus-circle"></i> Create New Role
                </a>
            @endcan
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info me-1" href="{{ route('roles.show', $role->id) }}">
                                            <i class="bi bi-eye"></i> Show
                                        </a>
                                        @can('role-edit')
                                            <a class="btn btn-sm btn-primary me-1" href="{{ route('roles.edit', $role->id) }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::button('<i class="bi bi-trash"></i> Delete', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-sm btn-danger',
                                                'onclick' => "return confirm('Are you sure you want to delete this role?')",
                                            ]) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
