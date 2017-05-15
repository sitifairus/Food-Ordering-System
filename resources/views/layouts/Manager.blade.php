<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Manager Page</title>

    <!-- Bootstrap CSS -->    
    <link href="../manager/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../manager/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../manager/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../manager/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="../manager/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="../manager/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="../manager/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="../manager/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="../manager/css/widgets.css" rel="stylesheet">
    <link href="../manager/css/style.css" rel="stylesheet">
    <link href="../manager/css/style-responsive.css" rel="stylesheet" />
    <link href="../manager/css/xcharts.min.css" rel=" stylesheet"> 
    <link href="../manager/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <header class="header dark-bg">
            <!--logo start-->
            <a href="#" class="logo">HH<span class="lite">Manager</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- alert notification start-->
                    <li class="dropdown">
                        <span class="username">
                            User: {{session()->get('current_user.name')}}
                            <br>
                            Employee ID: {{session()->get('current_user.employee_id')}}
                        </span>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a href="{{ route('logout')}}">
                            <i class="fa fa-power-off"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="{{ route('Manager.home')}}">
                          <i class="icon_house_alt"></i>
                          <span>Homepage</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-user-circle"></i>
                          <span>User</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('Manager.user')}}">User List</a></li>
                          <li><a class="" href="{{ route('Manager.addUser')}}">Add New User</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Menu</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{route('Manager.ManageMenuSet')}}">Set</a></li>
                          <li><a class="" href="{{ route('Manager.ManageMenuAlacarte')}}">A La Carte</a></li>
                          <li><a class="" href="{{ route('Manager.AddMenu') }}">Add New Menu</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="{{route('Manager.viewQueNum')}}" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manage Queue</span>
                      </a>
                  </li> 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              @yield('content')
          </section>
          <!--main content end-->
      </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="../manager/js/jquery.js"></script>
    <script src="../manager/js/jquery-ui-1.10.4.min.js"></script>
    <script src="../manager/js/jquery-1.8.3.min.js"></script>
    <script type="../managertext/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="../manager/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../manager/js/jquery.scrollTo.min.js"></script>
    <script src="../manager/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="../manager/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="../manager/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../manager/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="../manager/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="../manager/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="../manager/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="../manager/js/calendar-custom.js"></script>
    <script src="../manager/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="../manager/js/jquery.customSelect.min.js" ></script>
    <script src="../manager/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="../manager/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="../manager/js/sparkline-chart.js"></script>
    <script src="../manager/js/easy-pie-chart.js"></script>
    <script src="../manager/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../manager/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../manager/js/xcharts.min.js"></script>
    <script src="../manager/js/jquery.autosize.min.js"></script>
    <script src="../manager/js/jquery.placeholder.min.js"></script>
    <script src="../manager/js/gdp-data.js"></script>  
    <script src="../manager/js/morris.min.js"></script>
    <script src="../manager/js/sparklines.js"></script>    
    <script src="../manager/js/charts.js"></script>
    <script src="../manager/js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
    $(function(){
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
    });

  </script>

  </body>
</html>
