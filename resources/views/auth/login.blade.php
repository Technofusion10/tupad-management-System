@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center ">

    <div class="text-center mt-5">
        <h1 class="text-white">e-DILP Monitoring System</h1>
    </div>

    <div class="col-xl-10 col-lg-12 col-md-9 ">
        <div class="card o-hidden border-0 shadow-lg my-5">
            {{-- <div class="relative">
                <img
                src="{{asset('images/DOLE.png')}}"
                alt="img"
                class="w-[500px] h-full hidden rounded-r-2xl md:block object-cover"
                >
            </div> --}}

            <div class="card-body p-0 ">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image">
                        <img src="{{asset('images/dolee.png')}}" alt="img" style="height: 392px; width: 426px;">
                    </div>
                    <div class="col-lg-7">
                        <div class="pt-5 pl-5 pb-5 pr-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 font-weight-bold font-italic mb-4">Welcome Back!</h1>
                            </div>

                            @if (session('error'))
                                <span class="text-danger"> {{ session('error') }}</span>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('password.request')}}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h6 class="text-white">Developed By : <a class="text-white" href="https://techtoolindia.com">I.T. REGION 10</a></h6>
    </div>

</div>
@endsection
