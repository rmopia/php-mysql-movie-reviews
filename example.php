
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
	<form action="result.php" method="post">
		Value1: <input type="text" name = "field1" /><br/>
		Value2: <input type="text" name = "field2" /><br/>
		Value3: <input type="text" name = "field3" /><br/>
		Value4: <input type="text" name = "field4" /><br/>
		Value5: <input type="text" name = "field5" /><br/>
		<input type="submit" />
	</form>
	<?php
		echo "<div class='container'><h2>Recent Movie Releases</h2></div>"; ?>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "pwdpwd";
		$dbname = "movie_reviews";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->select_db($dbname) or die("Unable to connect to database.");
		
		//$query = "SELECT * FROM movies ORDER BY year DESC";
		$query = "SELECT title, year, runtime, age_rating, lead_actor, director, GROUP_CONCAT(g.genre) 
		as genres FROM movies m INNER JOIN movies_genres mg ON m.mid=mg.mid 
		INNER JOIN genres g ON g.gid=mg.gid GROUP BY m.mid ORDER BY year DESC";
		
		$response = mysqli_query($conn, $query);
		if($response){
			echo '<div class="container"><table class="table table-striped table-hover"><thead><tr>
			<th scope="col">Title</th>
			<th scope="col">Year</th>
			<th scope="col">Runtime (mins)</th>
			<th scope="col">Age Rating</th>
			<th scope="col">Genres</th>
			<th scope="col">Lead Actor</th>
			<th scope="col">Director</th></tr></thead>';
			
			while($row = mysqli_fetch_array($response)){
				echo '<tr><td align="left">' . $row['title'] . '</td> 
				<td align="left">' . $row['year'] . '</td>
				<td align="left">' . $row['runtime'] . '</td>
				<td align="left">' . $row['age_rating'] . '</td>
				<td align="left">' . $row['genres'] . '</td>
				<td align="left">' . $row['lead_actor'] . '</td>
				<td align="left">' . $row['director'] . '</td><td align="left">';
			}
			echo '</tr></table></div>';
		}
		else{
			echo "problem";
		}
		mysqli_close($conn);
	?>

</body>
</html>
