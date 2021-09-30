<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/eddie.png') }}" />
    <title>Remember</title>
</head>
<body>
    <section class="vh-100 align-items-center justify-content-center d-flex">
        <div class="container">
            <div class="row">
                <div class="col-12 align-items-center justify-content-center d-flex">
                    <img src="{{ asset('assets/eddie.png') }}" class="float-start" alt="Eddie" width="200" height="200">
                </div>
                <div class="align-items-center justify-content-center d-flex mb-4">
                    <h3>Hi, enter your email address</h3>
                </div>
                <div class="col-12 align-items-center justify-content-center d-flex">
                    <form action="{{ url('sendlink') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-3">
                            <input type="text" id="email" name="email" class="form-control form-control-lg"
                              placeholder="Enter a email address" value="{{ old('email') }}" />
                              <strong style="color: red">{{ $errors->first('email')}}</strong>
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary" type="submit" value="Send">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</body>
</html>
