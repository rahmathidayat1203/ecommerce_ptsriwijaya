@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Show User</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <h5 class="fw-bold">Name:</h5>
                    <p class="mb-0">{{ $user->name }}</p>
                </div>

                <div class="mb-3">
                    <h5 class="fw-bold">Email:</h5>
                    <p class="mb-0">{{ $user->email }}</p>
                </div>

                <div class="mb-3">
                    <h5 class="fw-bold">Roles:</h5>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $role)
                            <span class="badge bg-success">{{ $role }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No roles assigned.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
