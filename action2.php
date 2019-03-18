<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pirate Photo Printing</title>

    <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel='stylesheet' href="css/bootstrap.min.css" type='text/css' /> 
<link rel='stylesheet' href="css/test.css" type='text/css' />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin:0px;">
  
    <a href= "index.html"><h1>Pirate Photo Printing</h1></a>
	</nav>
	<!--   ************text begins here******************* -->
	

	

<table class="table table-bordered">
	<tr>
	<td colspan="2" style="width:100%">
<?php
$p4x6glossynextday = $_REQUEST['sgn'];
$p5x7glossynextday = $_REQUEST['mgn'];
$p8x10glossynextday = $_REQUEST['lgn'];
$p4x6mattenextday = $_REQUEST['smn'];
$p5x7mattenextday = $_REQUEST['mmn'];
$p8x10mattenextday = $_REQUEST['lmn'];
$p4x6glossy1hour = $_REQUEST['sgo'];
$p5x7glossy1hour = $_REQUEST['mgo'];
$p8x10glossy1hour = $_REQUEST['lgo'];
$p4x6matte1hour = $_REQUEST['smo'];
$p5x7matte1hour = $_REQUEST['mmo'];
$p8x10matte1hour = $_REQUEST['lmo'];
$fName = $_REQUEST['firstName'];
$lName = $_REQUEST['lastName'];
$userAddress = $_REQUEST['address'];
$pNumber = $_REQUEST['phoneNumber'];

echo "Thank You for your order $fName $lName.<br/><br/>";

$totalQuantity = ($p4x6glossynextday + $p5x7glossynextday + $p8x10glossynextday + $p4x6mattenextday + $p5x7mattenextday + $p8x10mattenextday + $p4x6glossy1hour + $p5x7glossy1hour + $p8x10glossy1hour + $p4x6matte1hour + $p5x7matte1hour + $p8x10matte1hour);

$total1hour = ($p4x6glossy1hour + $p5x7glossy1hour + $p8x10glossy1hour + $p4x6matte1hour + $p5x7matte1hour + $p8x10matte1hour);

$n11 = $p4x6glossynextday + $p4x6glossy1hour;

$n12 = $p4x6mattenextday + $p4x6matte1hour;

$n21 = $p5x7glossynextday + $p5x7glossy1hour;

$n22 = $p5x7mattenextday + $p5x7matte1hour;

$n31 = $p8x10glossynextday + $p8x10glossy1hour;

$n32 = $p8x10mattenextday + $p8x10matte1hour;

$total = ($n11 * .19) + ($n12 * .23) + ($n21 * .39) + ($n22 * .45) + ($n31 * .79) + ($n32 * .87);

if ($total1hour > 0 && $total1hour <= 60){
	$matteAdd = 2;
	$total = $total + $matteAdd;}
elseif ($total1hour > 60){
	$matteAdd = 2.5;
	$total = $total + $matteAdd;}

$discount =0;
$tempTotal = 0;
if ($total >= 35){
	$discount = round(($total *.05),2);
	$total = $total - $discount;}
	
$total = round($total,2);

echo "Please Review Your Order For Correctness<br/>";
if ($p4x6glossynextday !=0){
	echo "4x6 Glossy Next day :$p4x6glossynextday<br/>";
}
if ($p5x7glossynextday !=0){
	echo "4x6 Glossy Next day :$p5x7glossynextday<br/>";
}
if ($p8x10glossynextday !=0){
	echo "4x6 Glossy Next day :$p8x10glossynextday<br/>";
}
if ($p4x6mattenextday !=0){
	echo "4x6 Glossy Next day :$p4x6mattenextday<br/>";
}
if ($p5x7mattenextday !=0){
	echo "4x6 Glossy Next day :$p5x7mattenextday<br/>";
}
if ($p8x10mattenextday !=0){
	echo "4x6 Glossy Next day :$p8x10mattenextday<br/>";
}
if ($p4x6glossy1hour !=0){
	echo "4x6 Glossy Next day :$p4x6glossy1hour<br/>";
}
if ($p5x7glossy1hour !=0){
	echo "4x6 Glossy Next day :$p5x7glossy1hour<br/>";
}
if ($p8x10glossy1hour !=0){
	echo "4x6 Glossy Next day :$p8x10glossy1hour<br/>";
}
if ($p4x6matte1hour !=0){
	echo "4x6 Glossy Next day :$p4x6matte1hour<br/>";
}
if ($p5x7matte1hour !=0){
	echo "4x6 Glossy Next day :$p5x7matte1hour<br/>";
}
if ($p8x10matte1hour !=0){
	echo "4x6 Glossy Next day :$p8x10matte1hour<br/>";
}

echo "Total Number of Prints are: $totalQuantity<br/><br/>";

echo "Your Total Discounts are $discount<br/>";
echo money_format("Your Total Cost for Prints are $%i", $total);

if ($totalQuantity == 0 || $totalQuantity > 100){
	echo "Can only have 1-100 prints please go back to your order and try again.";
	header("Location: {$_SERVER['HTTP_REFERER']}");
	}




//echo "Your order is $inputQuantity pictures at $inputSize, $inputFinish finish, and $inputTime processing time.<br/>";
//echo "Total is : $$total<br/>";
?>
</td>
</tr>
<tr>
<td>If you would like to continue with this order please click the finish button below</td>
<td>If you would like to restart your order, please click below</td>
</tr>
<tr>
<td><p class="text-center"><a href="index.html" class="btn btn-primary" role="button">Finish</a></td></p>
<td><p class="text-center"><a href="opt2.html" class="btn btn-info" role="button">Return</a></td></p>
</tr>
</table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>