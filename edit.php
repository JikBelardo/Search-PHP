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
	<?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name" value="<?php echo $getUserByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo $getUserByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">age</label> 
			<input type="text" name="age" value="<?php echo $getUserByID['age']; ?>">
		</p>
		<p>
			<label for="firstName">civil status</label> 
			<input type="text" name="civil_status" value="<?php echo $getUserByID['civil_status']; ?>">
		</p>
		<p>
			<label for="firstName">camera type</label> 
			<input type="text" name="camera_type" value="<?php echo $getUserByID['camera_type']; ?>">
		</p>
		<p>
			<label for="firstName">years of experience</label> 
			<input type="text" name="years_of_experience" value="<?php echo $getUserByID['years_of_experience']; ?>">
		</p>
		<p>
			<label for="firstName">specialized event</label> 
			<input type="text" name="specialized_event" value="<?php echo $getUserByID['specialized_event']; ?>">
			<input type="submit" value="Save" name="editUserBtn">
		</p>
	</form>
</body>
</html>