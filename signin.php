<?php
//include config file 
include('config.php');
	
//include functions
include('functions.php');

//check to see if form is submitted 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Query records that have usernames that match those in the users table
	$sql = file_get_contents('sql/login.sql');
	$stmt = $database->prepare($sql);
	$stmt->execute (array (
		'username' => $username
	));
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// If $users is not empty
	if(!empty($users)) {

        // If passwords match
        if ($password == $users[0]['password']) {
				
            // Set $user equal to the first result of $users
			$user = $users[0];
            // Set a session variable with a key of userID equal to the userID returned
			$_SESSION['userID'] = $user['userid'];
			$_SESSION['isAdmin'] = $user['isAdmin'];
            // Redirect to the index.php file
			header("LOCATION: listing.php");
			die();
			
		
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="css/signin.css">
  </head>
 <body>

    <div class="container">

      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>