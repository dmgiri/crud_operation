<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$category = mysqli_real_escape_string($mysqli, $_POST['category']);	
	$brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
	$serial = mysqli_real_escape_string($mysqli, $_POST['serial']);
		
	// checking empty fields
	if(empty($category) || empty($brand) || empty($description) || empty($stock) || empty($serial)) {
				
		if(empty($category)) {
			echo "<font color='red'>Category field is empty.</font><br/>";
		}
		
		if(empty($brand)) {
			echo "<font color='red'>Brand field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($stock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}

		if(empty($serial)) {
			echo "<font color='red'>Serial field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO `inventory` (`category`, `brand`, `description`, `stock`, `serial`) VALUES('$category','$brand','$description','$stock','$serial')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
