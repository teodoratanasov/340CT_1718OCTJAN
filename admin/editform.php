<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

$id = $_GET['id'];


//add dbconnection

include('dbconnect.php');

//create query

$query = "SELECT * FROM stock WHERE item_id='$id'";

$result = mysqli_query($conn, $query);



?>

<div class="container bg-info" stype="padding-top:20px;">

<h3>Order Stock Form</h3>

<form role="form" action="update.php" method="get">

<?php

while ($row = mysqli_fetch_assoc($result)){



?>

<input type="hidden" name="id" value="<?php echo $row['item_id']; ?>">

<div class="form-group">
<label>Stock</label>
<input type="text" name="sname" class="form-control" value="<?php echo $row['item_name']; ?>">
</div>

<div class="form-group">
<label>Stock price</label>
<input type="text" name="sprice" class="form-control" value="<?php echo $row['item_price']; ?>">
</div>

<div class="form-group">
<label>Stock quantity</label>
<input type="text" name="squantity" class="form-control" value="<?php echo $row['item_quantity']; ?>">
</div>
<button type="submit" class="btn bg-success btn-block">Order Stock</button>

<?php

}

mysqli_close($conn);

?>

</form>

</div>

</body>
</html>