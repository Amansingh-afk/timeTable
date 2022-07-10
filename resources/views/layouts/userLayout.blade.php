<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6e98be7892.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <style>
        .search_input {
            height: 36px;
            border-radius: 5px;
            border: 1px solid teal;
        }
    </style>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="orange">
            <div class="logo">

                <a href="" class="simple-text logo-normal">
                    <img src="../assets/img/smslogo.png" alt="img" width="300" />
                </a>
            </div>
            <div class="sidebar-wrapper " id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ route('teacher') }}">
                            <i class="fa-solid fa-bars-staggered"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="{{ route('logout') }}">
                            <i class="fa-solid fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <div class="container-fluid w-100 bg-dark">
                <a class="navbar-brand px-4 text-light">Dashboard</a>
            </div>
            <input type="search" name="" class="search_input w-50 m-2 bg-light px-2" id="" placeholder="Enter a keyword to search ">

            @yield('content')
        </div>
        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Chart JS -->
        <script src="../assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="../assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <!-- <script src="../assets/demo/demo.js"></script> -->
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                demo.initDashboardPageCharts();

            });
        </script>
</body>

</html>