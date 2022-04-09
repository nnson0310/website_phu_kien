<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
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
    <link rel="stylesheet" href="{{ asset('public/backend/pretty-checkbox/dist/pretty-checkbox.css') }}"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/monthly.css') }}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('public/backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('public/backend/js/morris.js') }}"></script>
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <style>
        a:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
    {{-- <div>
        {{ Session::get('success') }}
    </div> --}}
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="#" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
            </div>  
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('public/backend/images/avatar.jpg') }}">
                            <span class="username">
                                <?php 
                                    $name = Session::get('admin_name');
                                    if(isset($name)){
                                        echo '<span class="text-alert">'.$name.'</span>';
                                    }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#" data-toggle="modal" data-target="#changePassword" data-id="{{ Session::get('admin_id') }}" ><i class="fa fa-key"></i> Đổi mật khẩu</a></li>
                            <li><a href="{{ route('logout') }}""><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->    

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ route('dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        {{-- Category--}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-folder-open"></i>
                                <span>Danh Mục</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add_category') }}"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>
                                <li><a href="{{ route('list_category') }}"><i class="fa fa-circle-o"></i>Danh sách danh mục</a></li>
                            </ul>
                        </li>
                        {{-- End Category --}}

                        {{-- Brand --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-amazon"></i>
                                <span>Thương Hiệu</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add_brand') }}"><i class="fa fa-circle-o"></i>Thêm thương hiệu</a></li>
                                <li><a href="{{ route('list_brand') }}"><i class="fa fa-circle-o"></i>Danh sách thương hiệu</a></li>
                            </ul>
                        </li>
                        {{-- End Brand --}}

                        {{-- Product --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-shopping-basket"></i>
                                <span>Sản Phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add_product') }}"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
                                <li><a href="{{ route('list_product') }}"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
                            </ul>
                        </li>
                        {{-- End Product --}}

                        {{-- Orders --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Đơn hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('show_all_orders') }}"><i class="fa fa-circle-o"></i>Tất cả đơn hàng</a></li>
                                <li><a href="{{ route('show_orders',1) }}"><i class="fa fa-circle-o"></i>Đang chờ xử lý</a></li>
                                <li><a href="{{ route('show_orders',2) }}"><i class="fa fa-circle-o"></i>Đang giao</a></li>
                                <li><a href="{{ route('show_orders',3) }}"><i class="fa fa-circle-o"></i>Đã giao</a></li>
                                <li><a href="{{ route('show_orders',4) }}"><i class="fa fa-circle-o"></i>Đã hủy</a></li>
                            </ul>
                        </li>
                        {{-- End Orders --}}

                        {{-- News --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Tin tức</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('add_news') }}"><i class="fa fa-circle-o"></i>Thêm bài viết</a></li>
                                <li><a href="{{ route('add_tags') }}"><i class="fa fa-circle-o"></i>Thêm tags</a></li>
                                <li><a href="{{ route('list_news') }}"><i class="fa fa-circle-o"></i>Danh sách bài viết</a></li>
                                <li><a href="{{ route('list_tags') }}"><i class="fa fa-circle-o"></i>Danh sách tags</a></li>
                            </ul>
                        </li>
                        {{-- End News --}}

                        {{-- Customer --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-users"></i>
                                <span>Khách hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('list.customers') }}"><i class="fa fa-circle-o"></i>Danh sách khách hàng</a></li>
                            </ul>
                        </li>
                        {{-- End Customer --}}

                        {{-- Recycle --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-recycle"></i>
                                <span>Thùng rác</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('recycle_category') }}"><i class="fa fa-circle-o"></i>Danh mục</a></li>
                                <li><a href="{{ route('recycle_brand') }}"><i class="fa fa-circle-o"></i>Thương hiệu</a></li>
                                <li><a href="{{ route('recycle_product') }}"><i class="fa fa-circle-o"></i>Sản phẩm</a></li>
                                <li><a href="{{ route('recycle_orders') }}"><i class="fa fa-circle-o"></i>Đơn hàng</a></li>
                                <li><a href="{{ route('recycle_news') }}"><i class="fa fa-circle-o"></i>Tin tức</a></li>
                                <li><a href="{{ route('recycle_tags') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
                            </ul>
                        </li>
                        {{-- End Recycle --}}

                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('main_content')
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2021 Visitors. All rights reserved | Design by <a href="#">Nguyễn Ngọc Sơn</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>

    <div class="modal" id="changePassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-danger" id="exampleModalLabel">Đổi mật khẩu</h2>
            </div>
            <form id="contact-form">
            <div class="modal-body">
                  {{--   {{ @csrf_field() }} --}}
                   {{--  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mật khẩu cũ:</label>
                    <input type="text" class="form-control" id="password" name="old_password">
                    <input type="hidden" name="admin_id" id="admin_id">
                    </div> --}}
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Mật khẩu mới:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                    <input type="hidden" name="admin_id" id="admin_id">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Xác nhận mật khẩu mới:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                        >
                    </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="changePassword" type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#changePassword').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget)          
                var admin_id = button.data('id');
                var modal = $(this);
                modal.find('#admin_id').val(admin_id);   
            });

            $('#contact-form').on('submit', function(e){
                e.preventDefault();

                var new_password = $('#new_password').val();
                var confirm_password = $('#confirm_password').val();
                var admin_id = $('#admin_id').val();

                //Ajax call
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: "{{ route('change_password') }}",
                    data: {
                        'new_password': new_password,
                        'confirm_password': confirm_password,
                        'admin_id': admin_id
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#contact-form')[0].reset();//reset form after ajax success
                        alert(response.message);
                    },
                    error: function(response){
                        console.log('Ajax failed!');
                    }
                })
            });

        });
    </script>
</body>

</html>
