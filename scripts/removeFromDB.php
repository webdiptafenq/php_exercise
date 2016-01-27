<?php

$username = $_POST['username'];



include('connect.php');

// Perform queries 


$querydelete = "DELETE FROM `emailList` WHERE `username` = '$username'";

$updatedb = mysqli_query($con,$querydelete);

mysqli_close($con);

if ($updatedb) {
	echo "<br/>you have deleted Username: " . $username . "from the database";
} else {

	echo "info not deleted from database";
}

?>