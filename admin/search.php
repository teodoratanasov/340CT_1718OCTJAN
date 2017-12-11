<!doctype html>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="scm2_db";
$itemid="";
$name="";
$price="";
$quantity="";
$date="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
//get data from the form
function getData()
{
	$data = array();
	$data[0]=$_POST['item_id'];
	$data[1]=$_POST['item_name'];
	$data[2]=$_POST['item_price'];
	$data[3]=$_POST['item_quantity'];
	$data[4]=$_POST['item_date'];
	return $data;
}
//search for stock in the database
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM stock WHERE item_id = '$info[0]' OR item_name = '$info[1]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$itemid = $rows['item_id'];
					$name = $rows['item_name'];
					$price = $rows['item_price'];
					$quantity = $rows['item_quantity'];
					$date = $rows['item_date'];
					
				}
			}else{
				echo("NO SUCH STOCK IN THE SYSTEM");
			}
		} else{
			echo("result error");
		}
	
}

//delete data from the database
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `stock` WHERE item_id = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("data deleted");
			}else{
				echo("data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("error in delete".$ex->getMessage());
	}
}
//order stock query
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `stock` SET `item_name`='$info[1]',item_price='$info[2]',item_quantity='$info[3]',item_date='$info[4]' WHERE item_id = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("data updated");
			}else{
				echo("data not updated");
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}

?>
<html>
<head>
  <title>Stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
  <div class="container bg-info" stype="padding-top:20px;"> 
  <h3>Search Stock Form</h3>
<!-- creating the search stock form-->
<form method ="post" action="search.php">
  <div class="form-group">
  <label>Item Code</label>
	<input type="number" name="item_id" class="form-control" value="<?php echo($itemid);?>">
	</div>
  <div class="form-group">
  <label>Item Name</label>
  <input type="text" name="item_name" class="form-control" value="<?php echo($name);?>">
	</div>
  <div class="form-group">
  <label>Item Price</label>
  <input type="text" name="item_price" class="form-control"value="<?php echo($price);?>">
	</div>
  <div class="form-group">
  <label>Item Quantity</label>
  <input type="text" name="item_quantity" class="form-control" value="<?php echo($quantity);?>">
	</div>
  <div class="form-group">
  <label>Date</label>
  <input type="text" name="item_date" class="form-control" value="<?php echo($date);?>">
	</div>
  <!-- adding buttons for the different functions-->
		<input type="submit" class="btn btn-info btn-block" name="search" value="Find">
		<input type="submit" class="btn btn-primary" name="update" value="Order">
		<input type="submit" class="btn btn-danger" name="delete" value="Delete">
    <a href="Stock4.php" class="btn btn-warning" role="button">Back</a>
		
	
</form>
</div>
</body>
</html>
