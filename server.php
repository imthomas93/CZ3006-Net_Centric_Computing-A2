<?php 

//grab information from client side
$name = $_POST["userName"];
$paymentMode = $_POST["paymentMethod"];
$noOfApples = $_POST["appleQuantity"];
$noOfOrange = $_POST["orangeQuantity"];
$noOfBanana = $_POST["bananaQuantity"];

//variable declaration and assignments
$appleCost = 0.69;
$orangeCost = 0.59;
$bananaCost = 0.39;
$totalAppleCost = $appleCost*$noOfApples;
$totalOrangeCost = $orangeCost*$noOfOrange;
$totalBananaCost = $bananaCost*$noOfBanana;
$totalCost = $totalAppleCost + $totalOrangeCost + $totalBananaCost;

//Set to 2decimal place
number_format((float)$totalCost, 2, '.', '');
//Get current Timestamp
date_default_timezone_set('Asia/Singapore'); 
$now = mktime();
$currTime = date('l jS \of F Y h:i:s A',$now);

if(file_exists("order.txt")){
	$file = fopen("order.txt", 'r');
	$line = fgets($file);
	$newLine;
	// find the line and get current customer count
	$count = filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	$count = $count+1;
	$newLine .= "Customer Count: ".$count."\r\n";

	$line = fgets($file);
	$count = filter_var($line, FILTER_SANITIZE_NUMBER_INT) + $noOfApples;
	$newLine .= "Total number of Apples: ".$count."\r\n";

	$line = fgets($file);
	$count = filter_var($line, FILTER_SANITIZE_NUMBER_INT) + $noOfOrange;
	$newLine .= "Total number of Oranges: ".$count."\r\n";

	$line = fgets($file);
	$count = filter_var($line, FILTER_SANITIZE_NUMBER_INT) + $noOfBanana;
	$newLine .= "Total number of Bananas: ".$count."\r\n";
	$line = fgets($file);
	while(! feof($file)){
		$newLine .= $line;
		$line = fgets($file);
	}
	fclose($file);
	
	$file = fopen("order.txt", "w");
	fwrite($file, $newLine);
	fclose($file);

	// Append new order
	$orderDetail = "==========================================================\n";
	$orderDetail .= "Date of Order: ".$currTime."\r\n";
	$orderDetail .= "Purchased By: ".$name."\r\n";
	$orderDetail .= "Payment Method: ".$paymentMode."\r\n\n";
	$orderDetail .= "Quantity of Apples: ".$noOfApples."\r\n";
	$orderDetail .= "Quantity of Oranges: ".$noOfOrange."\r\n";
	$orderDetail .= "Quantity of Bananas: ".$noOfBanana."\r\n";
	$orderDetail .= "==========================================================\n";
	$file = fopen("order.txt", "a");
	fwrite($file, $orderDetail);
	fclose($file);
}
else{
	// create a new order.txt
	$txt = "Customer Counter : 1\r\n";
	$txt .= "Total number of Apples: ".$noOfApples."\r\n";
	$txt .= "Total number of Oranges: ".$noOfOrange."\r\n";
	$txt .= "Total number of Bananas: ".$noOfBanana."\r\n\n";

	$file = fopen("order.txt", "w");
	fwrite($file, $txt);
	fclose($file);

	// Append new order
	$orderDetail = "==========================================================\n";
	$orderDetail .= "Date of Order: ".$currTime."\r\n";
	$orderDetail .= "Purchased By: ".$name."\r\n";
	$orderDetail .= "Payment Method: ".$paymentMode."\r\n\n";
	$orderDetail .= "Quantity of Apples: ".$noOfApples."\r\n";
	$orderDetail .= "Quantity of Oranges: ".$noOfOrange."\r\n";
	$orderDetail .= "Quantity of Bananas: ".$noOfBanana."\r\n";
	$orderDetail .= "==========================================================\n";
	$file = fopen("order.txt", "a");
	fwrite($file, $orderDetail);
	fclose($file);
}
?>
<!DOCTYPE html>
<head>
	<title> Fruit Order Receipt </title>
	<link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Thomas Lim">
</head>
<body>
	<table align="center">
		<td class= "orderDetails" colspan ="5">
		<h1> Fruit Order Receipt</h1>
      	<legend><span class="number">1</span>Your Order Details</legend>
		Date of Order: <?php echo $currTime ?><br>
		Purchase By: <?php echo $name ?><br>
		Payment Mode: <?php echo $paymentMode ?><br>
		</td>
			<tr>
				<td colspan="5">
					<legend><span class="number">2</span>Fruits Ordered</legend>
				</td>
			</tr>
			<tr class="tableHeader">
				<td colspan="2">Item</td>
				<td>Cost</td>
				<td>Quantity</td>
				<td>Total</td>
			</tr>
			<tr class="apple">
				<td>
					<img src="resource/Apple.jpg" title="appleImage" style="width:70px;height:80px;">
				</td>
				<td>Apple </td>
				<td><?php echo $noOfApples; ?></td>
				<td>$<?php echo $appleCost; ?></td>
				<td>$<?php echo $totalAppleCost; ?></td>
			</tr>
			<tr class="orange">
				<td>
					<img src="resource/Orange.jpg" title="orangeImage" style="width:70px;height:80px;">
				</td>
				<td>Orange</td>
				<td><?php echo $noOfOrange; ?></td>
				<td>$<?php echo $orangeCost; ?></td>
				<td>$<?php echo $totalOrangeCost; ?></td>
			</tr>
			<tr class="banana">
				<td>
					<img src="resource/Banana.jpg" title="bananaImage" style="width:70px;height:80px;">
				</td>
				<td>Banana </td>
				<td><?php echo $noOfBanana; ?></td>
				<td>$<?php echo $bananaCost; ?></td>
				<td>$<?php echo $totalBananaCost; ?></td>
			</tr>
			<tr>
				<td colspan="5">
					<legend><span class="number">3</span>Overall Total Price</legend>
				</td>
			</tr>
			<tr>
				<td class="alignLeft" colspan="4">Total: </td>
				<td id="Subtotal">$<?php echo $totalCost; ?></td>
			</tr>
			<tr>
				<td class="alignLeft" colspan="5">
					<a href="client.html" id="Linkback"> Back to Order Page</a>
				</td>
			</tr>
	</table>
</body>

