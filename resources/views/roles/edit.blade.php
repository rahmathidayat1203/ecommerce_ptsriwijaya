@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Role</h2>
            <a class="btn btn-secondary" href="{{ route('roles.index') }}">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label"><strong>Role Name</strong></label>
                    {!! Form::text('name', null, ['placeholder' => 'Role Name', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Permissions</strong></label>
                    <div class="row">
                        @foreach ($permission as $value)
                            <div class="col-md-4">
                                <div class="form-check">
                                    {{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions), ['class' => 'form-check-input', 'id' => 'perm_' . $value->id]) }}
                                    <label class="form-check-label"
                                        for="perm_{{ $value->name }}">{{ $value->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update Role</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
