<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Laravel Example Site</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-social.css') }}">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.css') }}">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="{{ URL::asset('css/fileinput.min.css') }}">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesome-bootstrap-checkbox.css') }}">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('styles')

</head>

<body>

    <div class="brand clearfix">
        <a href="index.html" class="logo"><img src="img/logo.jpg" class="img-responsive" alt=""></a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li><a href="#">Help</a></li>
            <li><a href="#">Settings</a></li>
            <li class="ts-account">
                <a href="#"><img src="http://placehold.it/128X128" class="ts-avatar hidden-side"  alt="">{{ Auth::user()->name }} <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Edit Account</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
        <nav class="ts-sidebar">
            <ul class="ts-sidebar-menu">
                <li class="ts-label">Search</li>
                <li>
                    <input type="text" class="ts-sidebar-search" placeholder="Search here...">
                </li>
                <li class="ts-label">Main</li>
                <li class="open"><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                {{--The way told by Edwin did not work so i had to google find the other way to make links --}}
                {{--<li><a href="{{route('admin.users.index')}}"><i class="fa fa-desktop"></i> All Users</a></li>--}}

                <li><a href="{{ action("AdminUsersController@index")}}"><i class="fa fa-desktop"></i>All Users</a></li>
                <li><a href="{{ action("AdminUsersController@create")}}"><i class="fa fa-desktop"></i>Create User</a></li>

                {{--<li><a href="{{route('admin/users/create')}}"><i class="fa fa-table"></i> Create Users</a></li>--}}
                <li><a href="{{ action("AdminPostsController@index")}}"><i class="fa fa-desktop"></i>Posts</a></li>
                <li><a href="{{ action("AdminPostsController@create")}}"><i class="fa fa-desktop"></i>Create Posts</a></li>
                {{--<li><a href="{{ action("AdminPostsController@edit")}}"><i class="fa fa-desktop"></i>Edit Posts</a></li>--}}

                <li><a href="{{ action("AdminCategoriesController@index")}}"><i class="fa fa-desktop"></i>Categories</a></li>
                <li><a href="{{ action("AdminCategoriesController@create")}}"><i class="fa fa-desktop"></i>Create Categories</a></li>
                <li><a href="{{ action("AdminMediaController@index")}}"><i class="fa fa-desktop"></i> All Media</a></li>
                <li><a href="{{ action("AdminMediaController@create")}}"><i class="fa fa-desktop"></i> Upload Media</a></li>

                </li>
                <li><a href="#"><i class="fa fa-files-o"></i> Sample Pages</a>
                    <ul>
                        <li><a href="blank.html">Blank page</a></li>
                        <li><a href="login.html">Login page</a></li>
                    </ul>
                </li>

                <!-- Account from above -->
                <ul class="ts-profile-nav">
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="ts-account">
                        <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Edit Account</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </ul>
        </nav>



        <div class="content-wrapper">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-lg-12-">

                        <h1 class="page-title">Users</h1>


                        <div class="well">

                            <p>

                                @yield('content')

                            </p>

                        </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

    @yield('scripts')



</body>

</html>