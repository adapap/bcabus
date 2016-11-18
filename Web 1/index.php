<script type="text/javascript" src="fade.js"></script>

</html>


<?php
	$FLAGWEB1 = "ABCTF{insp3ct3d_dat_3l3m3nt}";
	$PASSWEB1 = "7xfsnj65gsklsjsdkj";

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
				<center><h3 class="white-text">Web 1</h3><br><h3 class="white-text">Simple</h3></center>
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
			<div class="col l4 push-l4" id="response<?php if($pass != $PASSWEB1) echo "-wrong"?>">
				<?php
				if($pass == $PASSWEB1)
					echo $FLAGWEB1;
				else if($pass == " ")
					echo " ";
				else
					echo "Sorry, you're wrong"
				?>
			</div>
		</div>


	</body>

	<!-- 7xfsnj65gsklsjsdkj -->

			  <script type="text/javascript" src="fade.js"></script>

</html>