<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--favicon-->
    <link rel="icon" href="{{ url('/public/login_form_assets/images/favicon-32x32.png') }}" type="image/png" />

    <!--plugins-->
    <link href="{{ url('/public/login_form_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ url('/public/login_form_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ url('/public/login_form_assets/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ url('/public/login_form_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/public/login_form_assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/public/login_form_assets/css/icons.css') }}" rel="stylesheet">
    
    <title>Login</title>
</head>

<body class="bg-login">
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                    </div>
                                    
                                    <div class="login-separater text-center mb-4"> 
                                        <span>SIGN IN WITH EMAIL</span>
                                        <hr/>
                                    </div>

                                    <div class="form-body">
                                        <form method="POST" action="{{ route('login') }}" class="row g-3">
                                            @csrf
                                            
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input name="password" type="password" class="form-control border-end-0" id="password" placeholder="Enter Password"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="remember" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>

                                            @if (Route::has('password.request'))
                                                <div class="col-md-6 text-end"> 
                                                    <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                                </div>
                                            @endif

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bxs-lock-open"></i>Sign in
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="{{ url('/public/login_form_assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ url('/public/login_form_assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/public/login_form_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <!--Password show & hide js -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") 
                {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } 
                else if ($('#show_hide_password input').attr("type") == "password") 
                {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

    <!--app JS-->
    <script src="{{ url('/public/login_form_assets/js/app.js') }}"></script>
</body>

</html>