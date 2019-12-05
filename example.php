
<!DOCTYPE html>
<html lang="en">
<head>
  <title>503 Movie Reviews</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="example.php">503 Movie Reviews</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="example.php">Home</a></li>
      <li><a href="result.php">Reviews</a></li>
    </ul>
  </div>
</nav>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "pwdpwd";
		$dbname = "movie_reviews";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->select_db($dbname) or die("Unable to connect to database."); 
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h3>Add A Review</h3>
			<h4>New or returning users:</h4>
			<form action="result.php" method="post">
					<p>Username*: <!-- must be unique -->
					<input type="text" name="username" size="28" maxlength="20" value="" /></p>
					<p><em>First name (optional):</em>
					<input type="text" name="firstname" maxlength="50" size="20" value="" /></p>
					<p><em>Last name (optional):</em>
					<input type="text" name="lastname" maxlength="50" size="20" value="" /></p>
					<p><em>Email (optional):</em>
					<input type="text" name="email" size="24" value="" /></p>
					<p>Movie Title*:
					<select name="movies">
						<option value="1">Shrek the Third</option>
						<option value="2">Frozen</option>
						<option value="3">The Revenant</option>
						<option value="4">Once Upon a Time ... in Hollywood</option>
						<option value="6">Joker</option>
						<option value="7">Shrek</option>
						<option value="8">Shrek 2</option>
						<option value="9">Avengers: Endgame</option>
						<option value="10">Titanic</option>
						<option value="11">Frozen II</option>
						<option value="12">Black Panther</option>
						<option value="13">John Wick: Chapter 3 - Parabellum</option>
						<option value="14">The Shining</option>
						<option value="15">The Room</option>
					</select>
					<p>Score*:
					<select name="score">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
					<p>Review*:
					<textarea type="text" name="review" value="" rows="6" cols="40"></textarea></p>
					<input type="submit" name="submit" class="btn btn-primary">
			</form>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h3>Update A Review</h3>
				<form action="result.php" method="post">
				<p>Username*:
					<input type="text" name="username" size="28" maxlength="20" value="" /></p>
				<p>Movie Title*:
					<select name="movies">
						<option value="1">Shrek the Third</option>
						<option value="2">Frozen</option>
						<option value="3">The Revenant</option>
						<option value="4">Once Upon a Time ... in Hollywood</option>
						<option value="6">Joker</option>
						<option value="7">Shrek</option>
						<option value="8">Shrek 2</option>
						<option value="9">Avengers: Endgame</option>
						<option value="10">Titanic</option>
						<option value="11">Frozen II</option>
						<option value="12">Black Panther</option>
						<option value="13">John Wick: Chapter 3 - Parabellum</option>
						<option value="14">The Shining</option>
						<option value="15">The Room</option>
					</select>
					<p>Score*:
					<select name="score">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
					<p>Review*:
					<textarea type="text" name="review" value="" rows="6" cols="40"></textarea></p>
					<input type="submit" name="update-submit" class="btn btn-secondary">
				</form>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h3>Delete A Review</h3>
				<form action="result.php" method="post">
				<p>Username*:
					<input type="text" name="username" size="28" maxlength="20" value="" /></p>
				<p>Movie Title*:
					<select name="movies">
						<option value="1">Shrek the Third</option>
						<option value="2">Frozen</option>
						<option value="3">The Revenant</option>
						<option value="4">Once Upon a Time ... in Hollywood</option>
						<option value="6">Joker</option>
						<option value="7">Shrek</option>
						<option value="8">Shrek 2</option>
						<option value="9">Avengers: Endgame</option>
						<option value="10">Titanic</option>
						<option value="11">Frozen II</option>
						<option value="12">Black Panther</option>
						<option value="13">John Wick: Chapter 3 - Parabellum</option>
						<option value="14">The Shining</option>
						<option value="15">The Room</option>
					</select></p>
					<input type="submit" name="delete-submit" class="btn btn-danger">
				</form>
			</div>
	</div>
	</div>
	
	<?php
		echo "<div class='container'><h2>Recent Movie Releases</h2></div>";
		
		//$query = "SELECT * FROM movies ORDER BY year DESC";
		$query = "SELECT title, year, runtime, age_rating, lead_actor, director, GROUP_CONCAT(g.genre) 
		as genres FROM movies m INNER JOIN movies_genres mg ON m.mid=mg.mid 
		INNER JOIN genres g ON g.gid=mg.gid GROUP BY m.mid ORDER BY year DESC";
		
		$response = mysqli_query($conn, $query);
		if($response){
			echo '<div class="container"><table class="table table-striped table-hover"><thead><tr>
			<th scope="col">Movie Title</th>
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
