@extends('layouts.layouts')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Detail Role</h2>
            <a class="btn btn-primary" href="{{ route('roles.index') }}">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3"><strong>Name:</strong> {{ $role->name }}</h5>

                <h6 class="mb-2"><strong>Permissions:</strong></h6>
                @if (!empty($rolePermissions) && count($rolePermissions) > 0)
                    @foreach ($rolePermissions as $v)
                        <span class="badge bg-success mb-1">{{ $v->name }}</span>
                    @endforeach
                @else
                    <p class="text-muted">No permissions assigned.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
