@extends('auth.layout_register')
@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Register with</h5>
                    </div>

                    <div class="card-body">
                        <form role="form"method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    aria-label="Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    aria-label="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                    up</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Already have an account?
                                <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign
                                    in</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
