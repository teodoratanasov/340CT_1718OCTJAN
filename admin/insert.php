<?php

//adding database

include('dbconnect.php');

$id = $_POST['sid'];

$name = $_POST['sname'];

$price = $_POST['sprice'];

$quantity = $_POST['squantity'];

$date = $_POST['sdate'];

//creating query to add stock to the system

$query = "INSERT INTO stock(item_id, item_name, item_price, item_quantity, item_date) VALUES('$id', '$name', '$price', '$quantity', '$date')";

if(mysqli_query($conn ,$query)){

    header("Location:Stock4.php");
}

else{
    echo"Error in query";
}

mysqli_close($conn);


?>
