@extends('layouts.layouts')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center"> <!-- Tambahkan class ini untuk center horizontal -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" value="{{ Auth::user()->name }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input class="form-control" value="{{ Auth::user()->email }}" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password</label>
                                    <input class="form-control" name="password" type="password">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- Tutup row justify-content-center -->
    </div>
@endsection
