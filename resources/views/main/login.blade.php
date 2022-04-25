<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-3 p-md-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" action="{{ route('auth') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                                                <label class="custom-control-label" for="customCheck">Remember me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Log in</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <small>Belum punya akun? <a href="#">Daftar</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
