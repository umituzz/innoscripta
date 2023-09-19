<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')
    @include('layouts.css')
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input name="first_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                                   placeholder="{{ __('First Name') }}">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input name="last_name" type="text" class="form-control form-control-user" id="exampleLastName"
                                                   placeholder="{{ __('Last Name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                               placeholder="Email Address">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input name="password" type="password" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input name="password_confirmation" type="password" class="form-control form-control-user"
                                                   id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Register Account') }}
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@include('layouts.script')
</body>
</html>
