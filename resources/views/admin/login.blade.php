@extends('layouts.admin')

@section('content')
    <div class="content">

        <div class="container-fluid pb-5">

            <div class="row justify-content-md-center">
                <div class="card-wrapper col-12 col-md-4 mt-5">
                    <div class="brand text-center mb-3">
                        <a href="/"><img src="{{asset('/img/logo.png')}}"></a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin Login</h4>
                             <form method="POST" action="#" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" required=""
                                        autofocus="">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        required="">
                                    {{-- <div class="text-right">
                                        <a href="password-reset.html" class="small">
                                            Forgot Your Password?
                                        </a>
                                    </div> --}}
                                </div>

                                <div class="form-group">
                                    <div class="form-check position-relative mb-2">
                                        <input type="checkbox" class="form-check-input d-none" id="remember"
                                            name="remember">
                                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="remember"
                                            data-icon="&#xe936">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group no-margin">
                                    <a href="/index.html" class="btn btn-primary btn-block">
                                        Sign In
                                    </a>
                                </div>
                                {{-- <div class="text-center mt-3 small">
                                    Don't have an account? <a href="register.html">Sign Up</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <footer class="footer mt-3">
                        <div class="container-fluid">
                            <div class="footer-content text-center small">
                                <span class="text-muted">&copy; 2019 Graindashboard. All Rights Reserved.</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>



        </div>

    </div>
@endsection
