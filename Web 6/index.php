<?php
	$FLAGWEB6 = (file_get_contents("flag.txt"));
	$PASSWORD =  (file_get_contents("flag.txt")); //haha

	if(isset($_GET['password'])){
	
	if($PASSWORD == $_GET['password']){
			$success = true;
		}
		else{
			$success = false;
		}

	}
	else {
		$success = false;
	}


if('9223372036854775296' == '9223372036854776832'){
	echo("true")
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
				<center><h3 class="white-text">Web 4</h3><br><h3 class="white-text">You know what to do</h3></center>
			</div>
		</div>
		<div style="margin-top: 5%" class="row">
			<div class="col l4 push-l4">
				<form action="." method="get">
		  			<h5 class="white-text">Password: </h5>
		  			<input type="password" name="password" id="textBox" required>
		  			<input id="submit" type="submit" value="Submit">
				</form>
				<p>
				<?php 
						if($success){ 
							echo($FLAGWEB6);
						}
						  else{
						  	echo('Seems like your not a haxxor');
						  }
						 ?>
				</p>
			</div> 
		</div>
		

	</body>


		<script type="text/javascript" src="fade.js"></script>
</html>