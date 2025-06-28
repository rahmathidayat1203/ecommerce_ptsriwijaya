@extends('auth.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="card card-plain">
        <div class="card-header pb-0 text-start">
            <h4 class="font-weight-bolder">Sign In</h4>
            <p class="mb-0">Enter your email and password to sign in</p>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign
                    up</a>
            </p>
        </div>
    </div>
@endsection
