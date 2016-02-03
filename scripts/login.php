<?php
$message = "<p></p>";
$username = $password = "";
if ($_POST) {

	
$username = test_input($_POST['username']);
$password = md5($_POST['password']);

include('connect.php');

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password';";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)==1) {
	session_start();
	$_SESSION['username']='true';
	header('location:../index.php');
} else {
	$message = "<p>Incorrect Username or Password</p>";;
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>
<head>
	<title>LogIn</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>

<div class="page-header">
  <h1>Log In <small>Enter you login details</small></h1>
</div>

	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
					<div class="input-group input-group-md">
					  <span class="input-group-addon" id="sizing-addon1">Username</span>
					  <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
					</div><br/>
				
				
					<div class="input-group input-group-md">
					  <span class="input-group-addon" id="sizing-addon1">Password</span>
					  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
					</div><br/>
				
				<input type="submit" name="submit" class="btn btn-success"></input>
				<?php echo $message ?>

			</form>

			

		</div>
	</div>
</body>
</html>