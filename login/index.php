<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Page</title>
	<link rel="stylesheet" href="../conf/css/materialize.min.css">
	<link rel="stylesheet" href="../conf/css/costum.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../conf/js/materialize.min.js"></script>
	<script type="text/javascript" src="login.js"></script>
</head>
<body class="amber darken-3">
<main>
<div class="container">
	<div class="halaman-login">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<div class="section center amber-text text-darken-2">
						<i class="large material-icons">perm_identity</i>
						<h5>Login Pengurus</h5>
						<div id="error">
							
						</div>
					</div>

					<form method="post" id="log-form">
						<div class="row">
							<div class="input-field col s12">					
								<input type="text" class="validate" name="username" id="username" required>
								<label for="username">Username</label>
							</div>
							
							<div class="input-field col s12">						
								<input type="password" class="validate" name="password" id="password" required>
								<label for="password">Password</label>
							</div>
						</div>
						<div class="section center">
							<input class="btn amber waves-effect" type="submit" value="login" id="btn-login">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
</body>
</html>