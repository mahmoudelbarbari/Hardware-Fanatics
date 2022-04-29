<?php
session_start();
$home_url = "index.php";
if (isset($_SESSION["type"])) {
	if ($_SESSION["type"] == "ADMIN") {
		$home_url = "admin.php";
	}
}

?>
	<header>
		<a href="<?php echo $home_url; ?>" class="logo"> <img src="Images/logo.jpg" alt="Page Logo" width="200" height="200"></a>
		<nav>
			<ul>
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="pcComponents.php">PC Components</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="aboutUs.php">About Us</a></li>
				<li><a href="contactUs.php">Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<button class="ScrollToTop">
		<i class="material-icons">arrow_upward</i>
	</button>

	<div class="searchBox">
		<input class="searchInput" type="text" name="" placeholder="Search">
		<button class="searchButton" href="#">
			<i class="material-icons">
				<img src="Images/search.jpg" width="40" height="40">
			</i>
		</button>
	</div>

	<?php
        if (isset($_SESSION["id"]) && isset($_SESSION["email"]) || isset($_SESSION["type"])) {
			?>
			<div class="buttons">
				<div class="container">
					<a href="logout.php" class="btn effect01"><span>Logout</span></a>
				</div>
			</div>
					<?php
		} else {
			?>
    <div class="buttons">
		<div class="container">
			<a href="login.php" class="btn effect01"><span>Login</span></a>
			<a href="register.php" class="btn effect01"><span>Register</span></a>
		</div>
	</div>
			<?php
		}
	?>