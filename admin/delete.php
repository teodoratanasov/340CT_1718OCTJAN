<?php

$bid = $_GET['id'];

//database connection

include('dbconnect.php');

//query

$query = "DELETE FROM stock WHERE item_id='$bid' ";

if(mysqli_query($conn ,$query)){

    // redirect

    header("Location:Stock4.php");

}
else{

    echo "error" . mysqli_error($conn);
}

mysqli_close($conn);


?>