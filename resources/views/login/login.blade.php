<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Perawatan KA | Login</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/plugins/pace/pace.css" rel="stylesheet') }}">


    <!-- Theme Styles -->
    <link href="{{ asset('templates/source/assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/source/assets/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('templates/source/assets/images/inka-border.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('templates/source/assets/images/inka-border.png') }}" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">
            <h4 style="margin-top: 15rem" class="text-center justify-content-center">Perawatan Kereta Api</h4>
            <h4 class="text-center justify-content-center">By PT INKA MULTI SOLUSI SERVICE</h4>
        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="#" class="text-center">INKA MULTI SOLUSI SERVICE</a>
                <p class="auth-description">Silahkan Login menggunakan username dan password yang diberikan</p>
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-style-light" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.action') }}" autocomplete="off">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Username</label>
                    <input type="text" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail"
                        placeholder="email@gmail.com" name="email">

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        placeholder="Masukan password" name="password">
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    {{-- <a href="#" class="auth-forgot-password float-end">Forgot password?</a> --}}
                </div>
            </form>
            <div class="divider"></div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('templates/source/assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/main.min.js') }}"></script>
    <script src="{{ asset('templates/source/assets/js/custom.js') }}"></script>
</body>

</html>
