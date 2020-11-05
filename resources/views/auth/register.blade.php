@extends('layouts.app')

@section('content')
    <body class="authentication-bg"
          data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="{{ route('home') }}">
                                <span><img src="images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">{{ __('Sign Up') }}</h4>
                                <p class="text-muted mb-4">{{ __("Don't have an account? Create your account, it takes less than a minute") }}</p>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                           placeholder="{{ __('Enter your name') }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('Email address') }}</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                           placeholder="{{ __('Enter your email') }}" required>

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
                                               placeholder="{{ __('Enter your password') }}" required
                                               autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                               class="form-control"
                                               placeholder="{{ __('Enter your password') }}" required>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary" type="submit">{{ __('Sign Up') }}</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">{{ __('Already have account?') }}
                                <a href="{{ route('login') }}" class="text-muted ml-1">
                                    <b>{{ __('Log In') }}</b>
                                </a>
                            </p>
                        </div> <!-- end col-->
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
