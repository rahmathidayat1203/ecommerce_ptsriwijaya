@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit User</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}">
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
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                <div class="mb-3">
                    {!! Form::label('name', 'Name', ['class' => 'form-label fw-bold']) !!}
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('email', 'Email', ['class' => 'form-label fw-bold']) !!}
                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('password', 'Password', ['class' => 'form-label fw-bold']) !!}
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('confirm-password', 'Confirm Password', ['class' => 'form-label fw-bold']) !!}
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::label('roles', 'Roles', ['class' => 'form-label fw-bold']) !!}
                    {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-select', 'multiple']) !!}
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
