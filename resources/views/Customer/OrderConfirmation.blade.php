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

<title>Self-Service Foood Orderinf System</title>

<meta name="description" content="Eat Restaurant Bootstrap Template">

<meta name="author" content="webthemez">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" media="screen" href="../Customer/css/bootstrap.css">
<link rel="stylesheet" href="../Customer/css/font-awesome.css">
<link rel="stylesheet" href="../Customer/css/animate.css">
<link rel="stylesheet" href="../Customer/css/styles.css">

<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

 
</head>
<body>
    <!--feedback-->
    <div class="container">
        <div class="heading">
            <h2>Payment</h2>
        </div>
    </div>
     <div class="container w960 text-center">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 " >
          <div class="box-area" >
              <div class="box-area-text payment" >
                    <table width="45%" align="right">
                        <tr>
                            <td><h5>Date</h5></td>
                            <td style="text-align:right;"><b>{{date("l")}}</b><br>{{date("F j\,  Y")}}</td>
                        </tr>
                    </table>
                    <table class="table table-striped task-table" style="max-height:200px;">
                        <thead>
                            <th style="text-align:left;" width="55%">Item</th>
                            <th width="15%">Unit Price (RM)</th>
                            <th width="15%">Qantity</th>
                            <th width="15%" >Price (RM)</th>
                        </thead>
                        @if (count($SelectedItem) > 0)
                        <?php 
                        $total=0;
                        $i=0; 
                        ?>
                        <tbody>
                            @foreach ($SelectedItem as $selectedproduct)
                                <tr>
                                    <td style="text-align:left;" class="table-text"><div>{{ array_get($selectedproduct, 'product_name') }}</div></td>
                                    <td class="table-text"><div>{{ array_get($selectedproduct, 'product_price') }}</div></td>
                                    <td class="table-text"><div>{{ array_get($selectedproduct, 'quantity') }}</div></td>
                                    <td class="table-text"><div>{{ array_get($selectedproduct, 'quantity')*array_get($selectedproduct, 'product_price') }}</div></td>
                                </tr>
                                <?php 
                                    $total=$total+( array_get($selectedproduct, 'product_price') * array_get($selectedproduct, 'quantity') ); 
                                    $i++;
                                ?>
                            @endforeach
                            <tr>
                                <td colspan="3" style="text-align:right;"><b>GRAND TOTAL</br></td>
                                <td style="text-align:right;"><b>RM {{$total}}</td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
              </div>
              <br>
          </div>
          <div class="box-area-icon">
          <table align="center"  width="70%">
            <tr>
                <td>
                    <form action="{{ route('viewSet')}}">
                        <input  style="width:100%" type="submit" class="cancel submit" value="Cancel" >
                    </form>
                </td>
                @if (count($SelectedItem) > 0)
                    <td>
                        <form action="{{ route('pay')}}" >
                            <input  style="width:100%" type="submit" class="contact submit" value="Confirm" >
                        </form>
                    </td>
                @else
                    <td><input style="width:100%" type="submit" class="contact submit" value="Confirm" disabled></td>
                @endif
                
            </tr>
          </table>
          </div>
        </div>
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

<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
    $('.navbar-wrapper').stickUp();
    });
});
</script>
</body>
</html>