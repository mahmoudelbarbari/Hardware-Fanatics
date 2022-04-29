<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<?php
        require_once "head.php";
	?>
</head>
<body>
    <?php
	    require_once "header.php";
	?>

	<div class="AboutUsHeader">
		<div class="main">
			<h1> About US..</h1>
			<p>
				<b>The main website’s goal is to save users or consumers the time needed to research new hardware
					products...
					<span id="hiddenPara" hidden>
						and to simply list the products for the users choosing(with reviews and pre-builts available to
						preview on the website.
						The website simply lists recent, upcoming and future computer hardware such as Monitors,
						Graphics card, CPU’s etc…, it also entails recommendation of PC pre-builts.
						The main goal of the website is to bring the consumer up to date information about hardware
						technology and help the consumer with the decision of buying said hardware.
					</span>
				</b>
			</p>
			<button onclick="didClickReadMoreButton()" id="myBtn">Read more</button>
		</div>
	</div>

	<?php
	    require_once "footer.php";
	?>
	
</body>
</html>