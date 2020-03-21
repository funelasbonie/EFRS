<head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<?php    
    include 'conn.php';
    session_start();
?>
<?php 

if(isset($_POST['submit'])){

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];	

	$query = mysqli_query($con,"SELECT * FROM ADMIN_ACCOUNT WHERE USERNAME = '".$uname."' AND PASSWORD = '".$pass."'");

	if($row2 = mysqli_fetch_array($query)){
			$_SESSION['loggedin'] = true;
			$_SESSION['user'] = $row2['USERNAME'];
			$_SESSION['pass'] = $row2['PASSWORD'];
				header('location:adminmain.php');
		}
		else{
			$_SESSION['loggedin'] = false;
				echo '<script>success();</script>';

		}

}

?>
<div class="container">
    <form method="POST">
    <h2 class="form-signin-heading">Admin sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" name="uname" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
    <div class="checkbox">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <input class="btn btn-primary btn-block" name="submit" type="submit" value="Sign in">
    </form>

</div> <!-- /container -->
<?php
        include_once('footer.php');    
?>

