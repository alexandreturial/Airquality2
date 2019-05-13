<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>SB Admin v2.0 in Laravel 5</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>



    <link rel="stylesheet" href="{{ mix("assets/stylesheets/styles.css") }}" />
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
            <a class="navbar-brand" href="{{ url ('') }}">Air Quality</a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                        <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i><span class="sidebar-dark"> Dashboard</span></a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
            <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                <a href="{{ url ('chart') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a onclick="setInterval()" >Este</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                    <li>
                        <a href="{{ 'chart/'. 1 }}">Second Level Item</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </div>
    </nav>
    @yield('body')
</div >


<script src="{{ mix("assets/scripts/frontend.js") }}" type="text/javascript"></script>
</body>
</html>
