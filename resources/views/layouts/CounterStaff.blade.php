<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Counter's Staff Page</title>
        <meta name="description" content="description">
        <meta name="author" content="DevOOPS">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CounterStaff/plugins/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="../CounterStaff/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/xcharts/xcharts.min.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/select2/select2.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
        <link href="../CounterStaff/css/style_v1.css" rel="stylesheet">
        <link href="../CounterStaff/plugins/chartist/chartist.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
                <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
        <![endif]-->
        <script>
            function autoRefresh_div() {
                $("#orders-list").load({{ route('CounterStaff.ViewOrder') }}, function() {
                    setTimeout(autoRefresh_div, 1000);
                });
            }

            autoRefresh_div();
        </script>
    </head>
<body>
<!--Start Header-->
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
    <div class="devoops-modal">
        <div class="devoops-modal-header">
            <div class="modal-header-name">
                <span>Counter's Staff</span>
            </div>
        </div>
    </div>
</div>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-3">
                <a href="index_v1.html">Counter's Staff</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="col-xs-4 col-sm-12 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            <li class="hidden-xs">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <div class="user-mini pull-right">
                                        <span class="welcome">User: {{session()->get('current_user.name')}}</span>
                                        <span>Employee ID: {{session()->get('current_user.employee_id')}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('logout')}}">
                                    <i class="fa fa-power-off"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
               <li>
                    <a href="{{ route('CounterStaff.home') }}" >
                        <i class="fa fa-dashboard"></i>
                        <span class="hidden-xs">Homepage</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('CounterStaff.ViewOrder') }}" >
                        <i class="fa fa-pencil-square-o"></i>
                        <span class="hidden-xs">Customer's Order</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('CounterStaff.ViewAlacarteMenu')}}" class="dropdown-toggle">
                        <i class="fa fa-table"></i>
                         <span class="hidden-xs">Ala Carte Menu</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('CounterStaff.ViewSetMenu')}}" class="dropdown-toggle">
                        <i class="fa fa-table"></i>
                         <span class="hidden-xs">Set Menu</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-pencil-square-o"></i>
                         <span class="hidden-xs">Forms</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="ajax-link" href="ajax/forms_elements.html">Elements</a></li>
                        <li><a class="ajax-link" href="ajax/forms_layouts.html">Layouts</a></li>
                        <li><a class="ajax-link" href="ajax/forms_file_uploader.html">File Uploader</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
            <div id="about">
                <div class="about-inner">
                    <h4 class="page-header">Open-source admin theme for you</h4>
                    <p>DevOOPS team</p>
                    <p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
                    <p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
                    <p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
                    <p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
                </div>
            </div>
            <div class="preloader">
                <img src="../bootstrap/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
            </div>
            <div>@yield('content')</div>
        </div>
        <!--End Content-->
    </div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="../CounterStaff/plugins/jquery/jquery.min.js"></script>
<script src="../CounterStaff/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../CounterStaff/plugins/bootstrap/bootstrap.min.js"></script>
<script src="../CounterStaff/plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
<script src="../CounterStaff/plugins/tinymce/tinymce.min.js"></script>
<script src="../CounterStaff/plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="../CounterStaff/js/devoops.js"></script>
</body>
</html>





