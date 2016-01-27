<?php

$username = $_POST['username'];
$email = $_POST['email'];


include('connect.php');

// Perform queries 

$queryadd = "INSERT INTO `emailList` (`userID`, `username`, `email`) VALUES (NULL, '$username', '$email');";

$updatedb = mysqli_query($con,$queryadd);

mysqli_close($con);

if ($updatedb) {
	echo "<br/>you have added Username: " . $username . " and the Email: " . $email . "to the database";
} else {

	echo "info not added to database";
}

?>