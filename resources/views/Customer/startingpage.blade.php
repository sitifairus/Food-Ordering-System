<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../Customer/css/bootstrap.css">
        <link rel="stylesheet" href="../Customer/css/font-awesome.css">
        <link rel="stylesheet" href="../Customer/css/animate.css">
        <link rel="stylesheet" href="../Customer/css/styles.css">

    </head>
    <body>
        <header id="header" style="">
        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="5000" id="bs-carousel">
        <!-- Overlay -->
        <div class="overlay">
        </div>
        <div class="">
        <div class="hero">
            <hgroup>
             <img src="../Customer/img/logo.png" alt="logo"/>
                <h1>Ordering Kiosk</h1>        
                <h3>Place Your Order</h3>
            </hgroup>
            <a class="btn btn-hero btn-lg" href="{{ route('startorder') }}">Start</a>
          </div>
        </div>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item slides active">
              <div class="slide-1"></div>
              <div class="hero">
              </div>
            </div>
            <div class="item slides">
              <div class="slide-2"></div>
              <div class="hero">        
              </div>
            </div>
            <div class="item slides">
              <div class="slide-3"></div>
              <div class="hero">   
              </div>
            </div>
        </div> 
        </div>    
        </header>
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
