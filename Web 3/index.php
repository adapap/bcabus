<?php
	$FLAGWEB2 = "ABCTF{don't_trust_th3_coooki3}";

	if(isset($_COOKIE['coookie'])){
		if(base64_decode($_COOKIE['coookie']) == "{admin:true}")
			$correct = true;	
		else{
			setcookie(coookie, base64_encode("{admin:false}"));
			echo(base64_decode($_COOKIE['coookie']));
		}
	}

	else {
		setcookie(coookie, base64_encode("{admin:false}"));
	}

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
				<h1 class="white-text" style="font-size: 30px; text-align: center;">
					<?php if($correct) 
							echo("Wow! You're an admin, maybe. Well anyway, here is your flag, " . $FLAGWEB2);
						  else{
						  	echo("You're not an admin. Please leave this site.");
						  }
						 ?>
				</h1>
			</div>
		</div>
	</body>

			  <script type="text/javascript" src="fade.js"></script>

</html>