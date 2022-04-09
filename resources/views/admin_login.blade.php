<!DOCTYPE html>

<head>
    <title>Dang Nhap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{ asset('public/backend/js/jquery-3.2.1.min.min.js') }}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng Nhập</h2>
            <form action="{{ route('postLogin') }}" method="post">
                {{-- Xu ly viec dang nhap --}}
                @csrf
                @if (Session::has('error'))
                    <p>{{ Session::get('error') }}</p>
                @endif
                @if ($errors->has('email'))
                    <h3 class="text-primary">{{$errors->first('email')}}</h3>
                @endif
                <input type="text" class="ggg" name="email" placeholder="Điền thông tin email">
                @if ($errors->has('password'))
                    <h3 class="text-primary">{{$errors->first('password')}}</h3>
                @endif
                <input type="password" class="ggg" name="password" placeholder="Điền thông tin password">
                {{-- --}}
                <span><input type="checkbox" />Nhớ đăng nhập</span>
                <h6><a href="#">Quên mật khẩu?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng Nhập" name="login">
            </form>
            {{-- <p>Don't Have an Account ?<a href="registration.html">Create an
                    account</a></p> --}}
        </div>
    </div>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>
</body>

</html>
