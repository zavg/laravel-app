@extends('layouts.app')

@section('content')
<body class="authentication-bg"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <span><img src="images/logo.png" alt="" height="18"></span>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">{{ __('Sign In') }}</h4>
                            <p class="text-muted mb-4">{{ __('Enter your email address and password to access service.') }}</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="emailaddress">{{ __('Email address') }}</label>
                                <input class="form-control" type="email" id="email" name="email" required=""
                                       placeholder="{{ __('Enter your email') }}">

                                @error('email')
                                <span class="invalid-feedback" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="{{ __('Enter your password') }}">

                                    @error('password')
                                    <span class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"> {{ __('Log In') }} </button>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <a class="btn-auth btn-github " href="{{ route('login.github') }}">
                                    Sign in with <b>Github</b>
                                </a>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                                                        class="text-muted ml-1"><b>Sign Up</b></a>
                        </p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    <script>document.write(new Date().getFullYear())</script>
</footer>

<!-- bundle -->
<script src="js/vendor.min.js"></script>
<script src="js/app.min.js"></script>

</body>
@endsection
