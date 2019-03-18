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
$inputSize = $_REQUEST['size'];
$inputFinish = $_REQUEST['finish'];
$inputTime = $_REQUEST['ptime'];
$inputQuantity = $_REQUEST['quantity'];
$promo = $_REQUEST['promo'];
$fName = $_REQUEST['firstName'];
$lName = $_REQUEST['lastName'];
$userAddress = $_REQUEST['address'];
$pNumber = $_REQUEST['phoneNumber'];

echo "Thank You for your order $fName $lName. Please Review your order below.<br/><br/>";

$p1 = 0;
$p2 = 0;
$p3 = 0;
$matteAdd = 0;


if ($inputSize == "4x6"){
	$p1 = .14;
	$p2 = .12;
	$p3 = .10;
	$matteAdd = .02;}
elseif ($inputSize == "5x7"){
	$p1 = .34;
	$p2 = .31;
	$p3 = .28;
	$matteAdd = .03;}
else{
	$p1 = .68;
	$p2 = .64;
	$p3 = .60;
	$matteAdd = .04;}


$q1 = 0;
$q2 = 0;
$q3 = 0;

if ($inputQuantity <= 50){
	$q1 = $inputQuantity;}
elseif (50 < $inputQuantity && $inputQuantity <= 75){
	$q1 = 50;
	$q2 = ($inputQuantity - 50);}
else{
	$q1 = 50;
	$q2 = 25;
	$q3 = $inputQuantity -75;}
	
$total = ($q1 * $p1) + ($q2 * $p2) + ($q3 * $p3);

if ($inputFinish == "Matte"){
	$total = $total + ($inputQuantity * $matteAdd);
}

if ($inputTime == "1 Hour"){
	if ($inputQuantity <= 60){
		$total = $total + 1;
	}
	else{
		$total = $total + 1.5;
	}
}

$discount1 = 0;
$discount2 = 0;

if ($total >= 35){
	$discount1 = $total * .05;
}

if ($promo == "N65M2" && $inputQuantity == 100){
	$discount2 = 2;
}

if ($discount1 != 0 && $discount2 != 0){
	if ($discount2 > $discount1){
		$total = $total - $discount2;
		echo "Only one discount provided at a time. You have recieved the Promo code discount of $2 off<br/><br/>";
	}
	else{
		$total = $total - $discount1;
		echo "Only one discount provided at a time. You have recieved the Automatic discount of 5 percent off<br/><br/>";
	}
}
else{
	if ($discount2 > $discount1){
		$total = $total - $discount2;
		echo "You have recieved $2 off todays purchase<br/><br/>";
	}
	elseif ($discount1 > $discount2){
		$total = $total - $discount1;
		echo "You have recieved 5 percent off todays purchase<br/><br/>";
	}
	else{
		echo "You did not recieve any discounts with todays purchase<br/><br/>";
	}
}


echo "Your order is $inputQuantity picture(s) at $inputSize, $inputFinish finish, and $inputTime processing time.<br/>";
echo money_format("Total is : $%i", $total);
?>
</td>
</tr>
<tr>
<td>If you would like to continue with this order please click the finish button below</td>
<td>If you would like to restart your order please click below</td>
</tr>
<tr>
<td><p class="text-center"><a href="index.html" class="btn btn-primary" role="button">Finish</a></td></p>
<td><p class="text-center"><a href="opt1.html" class="btn btn-info" role="button">Return</a></td></p>
</tr>
</table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


