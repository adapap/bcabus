<?php
	$FLAGWEB2 = "ABCTF{no(d3)_js_is_s3cur3}";
	$PASSWEB2 = "stopthatjs";

	if(isset($_POST['password']))
		$pass = $_POST['password'];
	else
		$pass = " ";
?>

<html>
	<head>
		  <link rel="stylesheet" href="main.css">
		  <link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

	</head>

	<body>
		<div class="row">
			<div class="col l6 push-l3">
				<center><h3 class="white-text">Web 2</h3><br><h3 class="white-text">That JQuery Hide...</h3></center>
			</div>
		</div>
		<div style="margin-top: 20%" class="row">
			<div class="col l4 push-l4">
				<form action="." method="post">
		  			<h5 class="white-text">Password: </h5>
		  			<input type="password" name="password" required>
		  			<input id="submit" type="submit" value="Submit">
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col l4 push-l4">
				<p id="response<?php if($pass != $PASSWEB2) echo "-wrong"?>">
				<?php
				if($pass == $PASSWEB2)
					echo $FLAGWEB2;
				else if($pass == " ")
					echo " ";
				else
					echo "Sorry, you're wrong"
				?>
				</p>
			</div>
		</div>


	</body>

	<!-- stopthatjs -->

		<script type="text/javascript" src="fade.js"></script>
</html>