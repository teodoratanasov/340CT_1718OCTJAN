<?php

$bid = $_GET['id'];

//database connection

include('dbconnect.php');

//delete query for removing stock

$query = "DELETE FROM stock WHERE item_id='$bid' ";

if(mysqli_query($conn ,$query)){

    // redirect to homepage

    header("Location:Stock4.php");

}
else{

    echo "error" . mysqli_error($conn);
}

mysqli_close($conn);


?>
