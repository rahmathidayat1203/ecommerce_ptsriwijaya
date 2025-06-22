@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Create New Role</h2>
            <a class="btn btn-primary" href="{{ route('roles.index') }}">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    {!! Form::text('name', null, ['placeholder' => 'Enter role name', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Permissions</label>
                    <div class="row">
                        @foreach ($permission as $value)
                            @php
                                $checkboxId = 'perm_' . Str::slug($value->name, '_'); // hindari karakter aneh
                                $isChecked = in_array($value->name, old('permission', $rolePermissions ?? [])); // support old input atau data edit
                            @endphp
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    {{ Form::checkbox('permission[]', $value->name, $isChecked, ['class' => 'form-check-input', 'id' => $checkboxId]) }}
                                    <label class="form-check-label" for="{{ $checkboxId }}">{{ $value->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Submit
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
