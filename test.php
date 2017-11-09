<?php
	<tr>
		<td class= "orderDetails" colspan ="5">
			<h1 align="center"> Fruit Order Receipt</h1>

			Date of Order: <?php echo $currTime ?><br>
			Purchase By: <?php echo $name ?><br>
			Payment Mode: <?php echo $paymentMethod ?><br>
		</td>

	<tr class="tableHeader">
		<td>Item</td>
		<td>Cost</td>
		<td>Quantity</td>
		<td>Total</td>
	</tr>
	<tr class="apple">
		<td>Apple</td>
		<td><?php echo $noOfApples; ?></td>
		<td>$<?php echo $appleCost; ?></td>
		<td>$<?php echo $totalAppleCost; ?></td>
	</tr>
	<tr class="orange">
		<td>Apple</td>
		<td><?php echo $noOfOrange; ?></td>
		<td>$<?php echo $orangeCost; ?></td>
		<td>$<?php echo $totalOrangeCost; ?></td>
	</tr>
	<tr class="banana">
		<td>Apple</td>
		<td><?php echo $noOfBanana; ?></td>
		<td>$<?php echo $bananaCost; ?></td>
		<td>$<?php echo $totalBananaCost; ?></td>
	</tr>
	<tr>
		<td class="alignLeft" colspan="4">Subtotal: </td>
		<td id="Subtotal">$<?php echo $totalCost; ?></td>
	</tr>

>
