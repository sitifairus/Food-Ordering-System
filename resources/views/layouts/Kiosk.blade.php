<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="UTF-8"/>
<title>Self-Service Food Ordering System</title>
<link rel="stylesheet" type="text/css" media="screen" href="../Customer/css/bootstrap.css">
<link rel="stylesheet" href="../Customer/css/font-awesome.css">
<link rel="stylesheet" href="../Customer/css/animate.css">
<link rel="stylesheet" href="../Customer/css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--wrapper start-->
<div class="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" style="height:50px; background-color:#F39C12;">
        <div class="navbar-header">
            <div style="width:70%">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group btn-group-lg" role="group"> 
                        <a href="{{ route('viewSet') }}" type="button" class="btn btn-lg contact submit">Set</a>
                    </div>
                    <div class="btn-group btn-group-lg" role="group">
                        <a href="{{ route('viewAlacarte') }}" type="button" class="btn btn-lg contact submit">A La Carte</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-nav-fixed" style="width:30%; margin-top:-54px; float:right;">
            <div>
               @include('Customer.selectedProduct')
            </div>
        </div>
    </nav>
    <div style="float-right; width:70%; padding-top:70px;">
        <div>
           @yield('content')
        </div>   
    </div>
</div><!--wrapper end-->

<!--Javascripts-->
<script src="../Customer/js/jquery.js"></script>
<script src="../Customer/js/modernizr.js"></script>
<script src="../Customer/js/bootstrap.js"></script>
<script src="../Customer/js/jquery-scrolltofixed.js"></script>
<script src="../Customer/js/jquery.nav.js"></script> 
<script src="../Customer/js/jquery.easing.1.3.js"></script>
<script src="../Customer/js/menustick.js"></script> 
<script src="../Customer/js/easing.js"></script>
<script src="../Customer/js/wow.js"></script>
<script src="../Customer/js/smoothscroll.js"></script>
<script src="../Customer/js/masonry.js"></script>
<script src="../Customer/js/imgloaded.js"></script>
<script src="../Customer/js/classie.js"></script>
<script src="../Customer/js/colorfinder.js"></script>
<script src="../Customer/js/gridscroll.js"></script>
<script src="../Customer/js/contact.js"></script>
<script src="../Customer/js/custom.js"></script>
</body>
</html>