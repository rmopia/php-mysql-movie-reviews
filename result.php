
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movie Reviews</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<h1 align="center">Movie Reviews</h1>
	<?php
		echo "<h2>Recent Movie Reviews</h2>";

		$servername = "localhost";
		$username = "root";
		$password = "pwdpwd";
		$dbname = "movie_reviews";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->select_db($dbname) or die("Unable to connect to database.");
		$query = "SELECT * FROM reviews";
		
		$response = mysqli_query($conn, $query);
		
		if($response){
			'<table class="table table-striped">';
			while($row = mysqli_fetch_array($response)){
				echo '<tr><td align="left">' . $row['review'] . '</td> 
				<td align="left">' . $row['score'] . '</td>
				<td align="left">' . $row['date_posted'] . '</td>';
			}
			echo "</tr></table>";
		}
	?>

</body>
</html>
