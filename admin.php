<!DOCTYPE html>
<html>

<head>
	<title>Administrator</title>
	<?php
        require_once "head.php";
	?>
</head>
<body>
    <?php
	    require_once "header.php";
	?>

	<div class="Manage">
		<a href="viewUser.php" class="admintitle">View Users</a>
		<img src="Images/users.jpeg" alt="users" style="width:200px;height:200px">
		<div class="manage prod">
			<a href="managepcComponents.php" class="admintitle">Manage PC Components</a>
			<img src="images/HD.png" alt="users" style="width:200px;height:200px">

		</div>
	</div>

	<?php
	    require_once "footer.php";
	?>
</body>
</html>