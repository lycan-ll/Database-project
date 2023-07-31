<?php
// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "students");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values of the email, name, and message inputs
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $FirstName = mysqli_real_escape_string($conn, $_POST["name"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    // Validate the user input
    // ...

    // Create a SQL INSERT statement to insert the feedback information into a feedback table
    $sql = "INSERT INTO Feedback (Email, FirstName, message) VALUES ('$Email', '$FirstName', '$message')";

    // Execute the SQL INSERT statement
    if (mysqli_query($conn, $sql)) {
        // Display a success message to the user
        echo "Thank you for your feedback!";
    } else {
        // Display an error message to the user
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>

	<title>Feedback Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style type="text/css">
		body {
			padding-top: 50px;
		}
		.form-group {
			margin-bottom: 20px;
		}
		.btn-submit {
			margin-top: 20px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Feedback Form</h1>
				<form method="post" action="feedback.php">
					<div class="form-group">
						<label for="name">Full Name:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
					</div>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
					</div>
					<div class="form-group">
						<label for="message">Message:</label>
						<textarea class="form-control" rows="5" id="message" name="message" placeholder="meassage" required></textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

