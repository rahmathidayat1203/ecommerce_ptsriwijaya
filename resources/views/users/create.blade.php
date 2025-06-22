@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Add New User</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        @if ($errors->any())
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
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="email@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Confirm Password:</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Ulangi Password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Role:</label>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-select', 'multiple']) !!}
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
