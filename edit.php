<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE inventory SET category='$category',brand='$brand',description='$description',stock='$stock',serial='$serial' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM inventory WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$category = $res['category'];
	$brand = $res['brand'];
	$description = $res['description'];
	$stock = $res['stock'];
	$serial = $res['serial'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Category</td>
				<td><input type="text" name="category" value="<?php echo $category;?>" required></td>
			</tr>
			<tr> 
				<td>Brand</td>
				<td><input type="text" name="brand" value="<?php echo $brand;?>" required></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>" required></td>
			</tr>
			<tr> 
				<td>Stock</td>
				<td><input type="number" name="stock" value="<?php echo $stock;?>" required></td>
			</tr>
			<tr> 
				<td>serial</td>
				<td><input type="text" name="serial" value="<?php echo $serial;?>" required></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
