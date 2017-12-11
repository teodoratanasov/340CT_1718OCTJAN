<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php

//add dbconnection

include('dbconnect.php');

//create query

$query = "SELECT * FROM stock";

$result = mysqli_query($conn ,$query);


?>

<div class="container bg-info" style="padding-top:20px; padding-bottom:20px;"> 
  <h2>Stock</h2>
 <div class="row">

 <div class="col-sm-4">

 <form role="form" action="insert.php" method="post">

 <div class="form-group">
 <label>Item Code</label>

 <input type="text" name="sid" class="form-control">
 </div>
<div class="form-group">
<label>Stock Name</label>

<input type="text" name="sname" class="form-control">
</div>

<div class="form-group">
<label>Price</label>

<input type="text" name="sprice" class="form-control">
</div>
<div class="form-group">
<label>Quantity</label>

<input type="text" name="squantity" class="form-control">
</div>
<div class="form-group">
<label>Date</label>

<input type="text" name="sdate" class="form-control">
</div>



<button type="submit" class="btn btn-info btn-block">
Add New Stock</button>

</form>

</div>

<div class="col-sm-12">

<table class="table">
<thead>
<tr>
<th>Item Code</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Last Ordered</th>
<th>Staff Check</th>
<th>Actions</th>
<th><a href="search.php" class="btn btn-warning" role="button">Search in Stock</a></th>
</tr>
</thead>
<tbody>

<?php

while ($row = mysqli_fetch_assoc($result)){


//Display the stock from the database
?>
  
<tr>
<td><?php echo $row['item_id']; ?></td>
<td><?php echo $row['item_name']; ?></td>
<td><?php echo $row['item_price']; ?></td>
<td><?php if($row['item_quantity'] > 10): ?>
    Available: <?php echo $row['item_quantity']; ?>
  <?php else: ?>
    Low on stock
  <?php endif; ?></td>
<td><?php echo $row['item_date']; ?></td>
<td>1</td>
<td>
<a href="editform.php?id=<?php echo $row['item_id']; ?>" class="btn btn-success" role="button">Order Stock</a>
<a href="delete.php?id=<?php echo $row['item_id']; ?>" class="btn btn-danger" role="button">Delete Stock</a>

</td>
</tr>

<?php
}
mysqli_close($conn);

?>
</tbody>

</table>

</div>


</div>

</div>

</body>
</html>
