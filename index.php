<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM `inventory`"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Inventory System</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Category</td>
		<td>Brand</td>
		<td>Description</td>
		<td>Stock</td>
		<td>Serial</td>
		<td></td>
		
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['category']."</td>";
		echo "<td>".$res['brand']."</td>";
		echo "<td>".$res['description']."</td>";	
		echo "<td>".$res['stock']."</td>";	
		echo "<td>".$res['serial']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
