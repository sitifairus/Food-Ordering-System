<!DOCTYPE html>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
use Illuminate\Support\Facades\DB;
$Q1 = DB::table('display_qs')->where('id','1')->value('QueNumDispaly');
$Q2 = DB::table('display_qs')->where('id','2')->value('QueNumDispaly');
$Q3 = DB::table('display_qs')->where('id','3')->value('QueNumDispaly');
$Q4 = DB::table('display_qs')->where('id','4')->value('QueNumDispaly');
$Q5 = DB::table('display_qs')->where('id','5')->value('QueNumDispaly');
?>
<html lang="en">
    <head>
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
        <link rel="stylesheet" type="text/css" media="screen" href="../Customer/css/bootstrap.css">
        <link rel="stylesheet" href="../Customer/css/font-awesome.css">
        <link rel="stylesheet" href="../Customer/css/animate.css">
        <link rel="stylesheet" href="../Customer/css/styles.css">
        <meta charset="utf-8">
        <title>Counter's Staff Page</title>
        
    </head>
    <style>
        table, th, td {
            border: 3px solid black;
            color: black;
            font-weight: bold;
        }
        .small {
            font-size: 630%;
            text-align: center;
        }
        .big {
            font-size: 1500%;
        }
    </style>
<body>
    <table width="100%">

        <tr >
            <td class="big"style="width:55%;" rowspan="4">
                {{$Q1}}
            </td>
            <td class="small"style="height:170px">
                {{$Q2}}
            </td>
        </tr>
        <tr style="height:170px">
            <td class="small">
                {{$Q3}}
            </td>
        </tr>
        <tr style="height:170px">
            <td class="small">
                {{$Q4}}
            </td class="small">
        </tr>
        <tr style="height:170px">
            <td class="small">
                {{$Q5}}
            </td>
        </tr>
    </table>
</body>
</html>





