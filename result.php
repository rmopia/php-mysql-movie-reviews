
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="example.php">Movie Reviews</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="example.php">Home</a></li>
      <li class="active"><a href="result.php">Reviews</a></li>
    </ul>
  </div>
</nav>
	<?php
		echo "<div class='container'><h2>Recent Movie Reviews</h2></div>";

		$servername = "localhost";
		$username = "root";
		$password = "pwdpwd";
		$dbname = "movie_reviews";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->select_db($dbname) or die("Unable to connect to database.");
	?>
	
	<?php
		if(isset($_POST['update-submit']) && $_POST['update-submit'] != ''){
			printf('hello');
		}
		
		if(isset($_POST['delete-submit']) && $_POST['delete-submit'] != ''){
			printf('goodbye');
		}
	
		if(isset($_POST['submit']) && $_POST['submit'] != ''){ 
			$missing_reviewer_data = array();
			$missing_review_data = array();
			
			if(empty($_POST['username'])){
				$missing_reviewer_data[] = 'Username';
			}
			else{
				$user_name = $_POST['username'];
			}
			
			// the following fields are optional and not necessary to write a review
			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
			$email = $_POST['email'];
			
			// check review posts
			if(empty($_POST['movies'])){
				$missing_review_data[] = 'Title';
			}
			else{
				$mid = $_POST['movies'];
			}
			
			if(empty($_POST['score'])){
				$missing_review_data[] = 'Movie Score';
			}
			else{
				$score = $_POST['score'];
			}
			
			if(empty($_POST['review'])){
				$missing_review_data[] = 'Review';
			}
			else{
				$review = $_POST['review'];
			}
			
		}
		
		if(empty($missing_reviewer_data)){
			$q = "INSERT INTO reviewers(username, fname, lname, email) VALUES(?, ?, ?, ?)";
			
			$insert = mysqli_prepare($conn, $q);
			mysqli_stmt_bind_param($insert, "ssss", $user_name, $fname, $lname, $email);
			mysqli_stmt_execute($insert);
						
			$find_rid_query = "SELECT rid FROM reviewers WHERE username='".$user_name."'";
			$rid_response = mysqli_query($conn, $find_rid_query);
			if($rid_response){
				while($row = mysqli_fetch_array($rid_response)){
					$rid = $row['rid'];
				}
			}
		}
		if(empty($missing_reviewer_data)&& empty($missing_review_data)){
			$query = "INSERT INTO reviews(rid, mid, score, review, date_posted) VALUES(?,?,?,?,CURDATE())";
			
			$review_insert = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($review_insert, "iiis", $rid, $mid, $score, $review);
			mysqli_stmt_execute($review_insert);
		}
		
		$query2 = "SELECT * FROM reviewers INNER JOIN reviews ON 
		reviewers.rid=reviews.rid INNER JOIN movies ON reviews.mid=movies.mid ORDER BY date_posted DESC";
		
		$response = mysqli_query($conn, $query2);
		
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
		
		mysqli_close($conn);
	?>
	
	<div class="container">
		<form action="example.php">
			<button type="submit" class="btn btn-info">Go Back</button>
		</form>
	</div>

</body>
</html>
