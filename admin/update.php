<?php

include('dbconnect.php');

$id = $_GET['id'];

$name = $_GET['sname'];

$price = $_GET['sprice'];

$quantity = $_GET['squantity'];


//create query to order stock 

$query = "UPDATE stock SET item_name='$name', item_price='$price', item_quantity='$quantity' WHERE item_id='$id'";

if(mysqli_query($conn, $query)){

    //redirect to main page

    header("Location:Stock4.php");
}

else{
    
    echo "Error in query";

}

mysqli_close($conn);

?>
