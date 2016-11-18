<?php

	if(isset($_POST['id']))
			$id = $_POST['id'];
		else
			$id = " ";

	$con = mysqli_connect("localhost", "dude", "dude", "abctf");

	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	//$query = "select * from web4 where name = '$pass'";
	$query = "SELECT * FROM webeight where id = $id";
	echo($query);
	$result = $con->query($query);
	
	

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
				<center><h3 class="white-text">Dog Viewer</h3><br><h3 class="white-text"></h3></center>
			</div>
		</div>
		<div style="margin-top: 5%" class="row">
			<div class="col l4 push-l4">
				<form action="." method="post">
		  			<h5 class="white-text">ID: </h5>
		  			<input type="text" name="id" id="textBox" required>
		  			<input id="submit" type="submit" value="Submit">
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col l4 push-l4">
				<p>
					<?php if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>Breed: " . $row["breed"]. "<br>Color: " . $row["color"]. "<br>";
    }
} else {
    echo "0 results";

}

?>
				</p>
			</div>
		</div>


	</body>

	<!-- stopthatjs -->

		<script type="text/javascript" src="fade.js"></script>
</html>