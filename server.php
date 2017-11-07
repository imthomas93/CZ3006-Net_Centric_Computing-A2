<?php

// receiving information from client
$userName = $_POST["userName"];
$paymentMethod= $_POST["paymentMethod"];
$appleQuantity = $_POST["appleQuantity"];
$orangeQuantity = $_POST["orangeQuantity"];
$bananaQuantity = $_POST["bananaQuantity"];

//variable declaration and assignments
$appleCost = 0.69;
$orangeCost = 0.59;
$bananaCost = 0.39;
$totalAppleCost = $appleCost*$appleQuantity;
$totalOrangeCost = $orangeCost*$orangeQuantity;
$totalBananaCost = $bananaCost*$bananaQuantity;
$totalCost = $totalAppleCost + $totalOrangeCost + $totalBananaCost;

//Get current Timestamp
date_default_timezone_set('Asia/Singapore'); 
$now = mktime();
$currentTime = date('l jS \of F Y h:i:s A',$now);

//save receipt in string and output to file
$varOrdersOutput ="";
$varReceiptOutput ="";
$varOrdersOutput .= "=========================================================="."\r\n";
$varOrdersOutput .= "Order By : ". $name."\r\n";
$varOrdersOutput .= "Timestamp: " . $currentTime ."\r\n";
$varOrdersOutput .= "=========================================================="."\r\n";
$varOrdersOutput .=	"Orders: " ."\r\n";
$varOrdersOutput .=	"Total number of apples  : " . $appleQuantity ."\r\n";
$varOrdersOutput .=	"Total number of oranges : " . $orangeQuantity ."\r\n";
$varOrdersOutput .=	"Total number of bananas : " . $bananaQuantity ."\r\n";
$varOrdersOutput .= "=========================================================="."\r\n";
$varOrdersOutput .= "\r\n";

$varReceiptOutput .= '<!DOCTYPE html>'."\r\n";
$varReceiptOutput .= '<head>'."\r\n";
$varReceiptOutput .= '<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>'."\r\n"; 
$varReceiptOutput .= '<title>Receipt</title>'."\r\n";
$varReceiptOutput .= "<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>"."\r\n";
$varReceiptOutput .=  '<link rel="stylesheet" href="css/tables.css">'."\r\n";
$varReceiptOutput .= '</head>'."\r\n";
$varReceiptOutput .= '<body>'."\r\n";
$varReceiptOutput .= '<h1>Receipt of Order by: '.$name.'</h1>'."\r\n";
$varReceiptOutput .= '<table class="rwd-table">'."\r\n";
//first Row
$varReceiptOutput .= '<tr>'."\r\n" ;
$varReceiptOutput .= '<th>Type of Fruits.</th>'."\r\n";
$varReceiptOutput .= '<th>Quantity.</th>'."\r\n";
$varReceiptOutput .= '<th>Cost/Quantity.</th>'."\r\n";
$varReceiptOutput .= '<th>Total Cost.</th>'."\r\n";
$varReceiptOutput .= '</td>'."\r\n";
$varReceiptOutput .= '</tr>'."\r\n";
//2nd Row
$varReceiptOutput .= '<tr>'."\r\n" ;
$varReceiptOutput .= '<td data-th="apples">Apples</td>'."\r\n" ;
$varReceiptOutput .= '<td data-th="appleQuantity">'.$appleQuantity.'</td>'."\r\n";
$varReceiptOutput .= '<td data-th="applePrice">$0.69</td>'."\r\n";
$varReceiptOutput .= '<td data-th="totalAppleCost">$'.$totalAppleCost.'</td>'."\r\n";
$varReceiptOutput .=  '</tr>'."\r\n";
//3rd Row
$varReceiptOutput .= '<tr>'."\r\n" ;
$varReceiptOutput .= '<td data-th="orange">Oranges</td>'."\r\n" ;
$varReceiptOutput .= '<td data-th="orangeQuantity">'.$orangeQuantity.'</td>'."\r\n";
$varReceiptOutput .= '<td data-th="orangePrice">$0.59</td>'."\r\n";
$varReceiptOutput .= '<td data-th="totalOrangeCost">$'.$totalOrangeCost.'</td>'."\r\n";
$varReceiptOutput .=  '</tr>'."\r\n";
//4th Row
$varReceiptOutput .= '<tr>'."\r\n" ;
$varReceiptOutput .= '<td data-th="banana">Bananas</td>'."\r\n" ;
$varReceiptOutput .= '<td data-th="orangeQuantity">'.$bananaQuantity.'</td>'."\r\n";
$varReceiptOutput .= '<td data-th="bananaPrice">$0.59</td>'."\r\n";
$varReceiptOutput .= '<td data-th="totalBananaCost">$'.$totalBananaCost.'</td>'."\r\n";
$varReceiptOutput .=  '</tr>'."\r\n";
//5th Row
$varReceiptOutput .= '<tr>'."\r\n" ;
$varReceiptOutput .= '<td data-th="totalCost1">Total Cost</td>'."\r\n" ;
$varReceiptOutput .= '<td colspan=2 data-th="empty"></td>'."\r\n";
$varReceiptOutput .= '<td data-th="totalCost2">$'.$totalCost.'</td>'."\r\n";
$varReceiptOutput .=  '</tr>'."\r\n";

$varReceiptOutput .= '</table>'."\r\n";
$varReceiptOutput .= '</body>'."\r\n";


//output to receipt file
$myfile = fopen("orderRecords.txt", "a") or die("Unable to open file!");
fwrite($myfile,$varOrdersOutput);
fclose($myfile);

//output to html view
$receiptFile = fopen("Receipt.html", "w") or die("Unable to open file!");
fwrite($receiptFile,$varReceiptOutput);
fclose($receiptFile);

header("Location: Receipt.html");
exit;
>