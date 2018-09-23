
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Agenda</title>
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<?php
			if(isset($_COOKIE['logado'])){
				header("location: /Agenda/logado.php");
			}
	?>
</head>
<body>
	<div class="container">
		<form action="logar.php" method="post">
			<div id="login-box">
				<div class="logo">
					<img src="public/img/login.png" class="img img-responsive img-circle center-block"/>
					<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
				</div>
				<div class="controls">
					<?php
				if(isset($_COOKIE['error'])){
						echo "<div class='danger alert-danger' style='text-align: center; padding: 10px;'>".$_COOKIE['error']."</div>";
					}
				?>
			<br>
			<input type="text" name="username" placeholder="Username" class="form-control" autocomplete="off" />
			<br>
			
			
			<input type="password" name="password" placeholder="Password" class="form-control" />
			<button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
		</div>
	</div>
</form>
</div>
</body>
</html>
