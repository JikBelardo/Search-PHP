<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name">
		</p>
		<p>
			<label for="firstName">age</label> 
			<input type="text" name="age">
		</p>
		<p>
			<label for="firstName">civil status</label> 
			<input type="text" name="civil_status">
		</p>
		<p>
			<label for="firstName">camera_type</label> 
			<input type="text" name="camera_type">
		</p>
		<p>
			<label for="firstName">years of experience</label> 
			<input type="text" name="years_of_experience">
		</p>
		<p>
			<label for="firstName">specialized event</label> 
			<input type="text" name="specialized_event">
			<input type="submit" name="insertUserBtn">
		</p>
	</form>
</body>
</html>