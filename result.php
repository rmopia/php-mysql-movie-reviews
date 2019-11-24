
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
		echo "<div class='container'><h2>Recent Movie Reviews</h2></div>";

		$servername = "localhost";
		$username = "root";
		$password = "pwdpwd";
		$dbname = "movie_reviews";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->select_db($dbname) or die("Unable to connect to database.");
		$query = "SELECT * FROM reviewers INNER JOIN reviews ON 
		reviewers.rid=reviews.rid INNER JOIN movies ON reviews.mid=movies.mid ORDER BY date_posted DESC";
		
		$response = mysqli_query($conn, $query);
		
		if($response){
			echo '<div class="container"><table class="table table-hover table-bordered">
			<th scope="col">Movie</th>
			<th scope="col">Review</th>
			<th scope="col">Score</th>
			<th scope="col">Date posted</th>
			';
			while($row = mysqli_fetch_array($response)){
				echo '<tr><td align="left">' . $row['title'] . '</td> 
				<td align="left">' . '<strong><em>' . $row['username'] . " says... </em></strong>" . $row["review"] . '</td>
				<td align="left">' . "<strong>" . $row['score'] . "</strong>" . '</td>
				<td align="left">' . "<p class='small'>" . $row['date_posted'] . "</p>" . '</td>';
			}
			echo "</tr></table></div>";
		}
	?>
	
	<div class="container">
		<form action="example.php">
			<button type="submit" class="btn btn-info">Go Back</button>
		</form>
	</div>

</body>
</html>
