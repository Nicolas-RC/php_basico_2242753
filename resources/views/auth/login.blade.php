<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/eddie.png') }}" />
    <title>ROCKSTAR</title>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="{{ asset('assets/eddie.png') }}" class="img-fluid" alt="Eddie">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if (session("message"))
                <div class="alert alert-success">
                    <div class="d-flex justify-content-center">
                        <h3>{{session("message")}}</h3>
                    </div>
                </div>
                @endif
              <form action="{{ url('login') }}" method="POST">
                @csrf
                <h1 class="h2">Login</h1>
                <br>

                @if (session("error_auth"))
                    <h5 style="color: red">{{ session("error_auth") }}</h5>
                @endif

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" value="{{ old('email') }}" />
                  <label class="form-label" for="email">Email address</label>
                  <br>
                  <strong style="color: red">{{ $errors->first('email')}}</strong>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" value="{{ old('password') }}" />
                  <label class="form-label" for="password">Password</label>
                  <br>
                  <strong style="color: red">{{ $errors->first('password')}}</strong>
                </div>

                <!-- Remember me and Remember password  -->
                <div class="form-outline mb-3">
                    <input type="checkbox" id="rememberMe" name="rememberMe" class="form-check-input"/>
                    <label class="form-label" for="rememberMe">Remember me</label>
                    <a class="float-xxl-end" href="{{ url('/changepassword') }}">Remember password</a>
                </div>

                <!-- Submit input -->
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-secondary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                </div>

              </form>
            </div>
          </div>
        </div>
    </section>
</body>
</html>
