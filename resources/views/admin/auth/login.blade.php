<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontEnd/images/codetree_favicon.png') }}">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/all.min.css') }}">
    <!--fontawesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/fontawesome.min.css') }}">
    <!--customised css file-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/custom_style.css') }}">
    <title>Login -Admin Panel</title>
</head>

<body class="form-body">
    <div class="container-fluid">
        <div class="row mt-5">

            <div class="offset-md-4 col-md-4 col-sm-4 col-xs-12 mt-5">
                <center style="background-color: white;">
                    <img class="img-fluid w-50" src="{{ asset('frontEnd/images/codetree.png') }}">
                    <center>
                        <form class="form-container" style="padding:35px 60px;margin-top:0px;background: transparent;"
                            method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            @if (Session::has('message'))
                            <p class="badge badge-danger" style="color:red;background-color: white;">
                                {{ Session::get('message') }}
                            </p>
                            @endif
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <p class="badge badge-danger" style="color:red;background-color: white;">
                                {{ $error }}
                            </p>
                            @endforeach
                            @endif

                            <div class="input-group" id="input-box">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                            </div>
                            <div class="input-group mt-3" id="input-box">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-block mt-3"
                                style="border-radius:0px; background-color: green">Login</button>
                        </form>
            </div>

        </div>
    </div>

    <!--js file-->
    <script src="{{ asset('/admin/asset/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/all.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/main.js') }}"></script>
</body>

</html>