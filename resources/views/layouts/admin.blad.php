<!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name ="description" content="">
    <meta name ="author" content="">

    <title>Admin</title>

    <link href="{{asset('css/app.css')}}"rel="stylesheet">
    <link href="{{asset('css/css.css')}}"rel="stylesheet">

    <script src ="http://oos.maxcdn.com/libs/html5shiv/3.7.0/htmlshiv.js"></script>
    <script src ="http://oos.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


</head>

<body id="admin-page">
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Billr</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-envelope-o fa-fw"></i> Bills</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-building-o fa-fw"></i> Companies</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-cog fa-fw"></i> Settings</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


    </div>
    <!-- /#page-wrapper -->

</div>


<script src="{{asset('js/js.js')}}"></script>
@yield('footer')

</body>



</html>