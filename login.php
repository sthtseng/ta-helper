<!DOCTYPE HTML>
<html>
<head>
    <title>TA Helper</title>
    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
</head>
<body class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Welcome to TA Helper</h2>
				<form class="form-signin" action="loginpost.php" method="post">
					<h4 class="form-signin-heading">Please sign in</h4>
					<label for="inputEmail" class="sr-only">Username</label>
					<input type="string" id="inputUsername" name="username" class="form-control" placeholder="Username" required="" autofocus="">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
					<!-- <div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
					</div> -->
				  <button class="btn btn-lg btn-primary btn-block" type="submit" id="sign-in-btn">Sign in</button>
				</form>
		    </div>
		</div>

    </div>
	<script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
</body>
</html>