<!-- JavaScript JavaScript--!>

function disableBox(){
	document.getElementById('totalCost').blur();
}

function validateNaN(){
	var errorMsg = "Please Enter:\n";

	var totalCost = document.forms["MainActivity"]["totalCost"].value;
	var userName = document.forms["MainActivity"]["userName"].value;
	var amountApple = document.forms["MainActivity"]["appleQuantity"].value;
	var amountOrange = document.forms["MainActivity"]["orangeQuantity"].value;
	var amountBanana = document.forms["MainActivity"]["bananaQuantity"].value;
	var paymentMethod = document.forms["MainActivity"]["paymentMethod"].value;


	if ((userName == null) || userName == ""){
		errorMsg += "User Name\n";
		document.getElementById("userName");
		result = false;
	}	

	if(totalCost == null || totalCost == "" || totalCost == "NaN" || totalCost == 0){
		errorMsg += "Total Cost\n";
		result = false;
	}

	if (paymentMethod == null || paymentMethod == ""){
		errorMsg += "Payment Method\n";
		result = false;
	}
	
	if (result == false){
		errorMsg += "Cannot be empty!"
		alert(errorMsg);
		result = true;
		return false;
	}
}

function validationAndCalculate(input){

	/*
	'^' = start with
	'$' = end with
	'*' = zero or more multiple repetion
	'\d' = digits 
	*/
	var tester = /^[\d]*$/;
	
	if (!tester.test(input.value)){
		alert("Only numbers are allowed. Please try again!");
		input.value = input.value.replace(/[^\d]/g,"");
		MainActivity.totalCost.value="NaN";
	}
	else{
		// process data here
		var amountApple = document.getElementById('appleQuantity').value;
		var amountOrange = document.getElementById('orangeQuantity').value;
		var amountBanana = document.getElementById('bananaQuantity').value;

		var appleCost = amountApple * 0.69;
		var orangeCost = amountOrange * 0.59
		var bananaCost = amountBanana * 0.39;
		var totalCost = appleCost + orangeCost + bananaCost;

		totalCost = Math.round(totalCost * 100) / 100
		MainActivity.totalCost.value= totalCost;
	}
}