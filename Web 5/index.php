<?php
$file = $_GET['filename']; // "../../etc/passwd\0"
if (file_exists($file . '.php')) {
    // file_exists will return true as the file /home/wwwrun/../../etc/passwd exists
    include $file . '.php';
    // the file /etc/passwd will be included

    echo "$file";
}
else{
	echo "$file.php";
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
			<div class="col l8 push-l2">
				<center><h3 class="white-text">Web 5</h3></center>
			</div>
		</div>
		<div style="margin-top: 5%" class="row">
			<div class="col l4 push-l4">
				<form action="." method="get">
		  			<h5 class="white-text">Name of file: </h5>
		  				<input type="text" name="filename" class="textBox" required>
		  				<input id="submit" type="submit" value="Submit">
				</form>
			</div>
		</div>


			</div>
		</div>


	</body>

		<script type="text/javascript" src="fade.js"></script>
</html>