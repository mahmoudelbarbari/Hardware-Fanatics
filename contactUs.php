<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <?php
        require_once "head.php";
	?>
</head>
<body>
<?php
	    require_once "header.php";
	?>

	<?php 
	
	if (!empty($_POST)) {
		if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["country"]) || empty($_POST["mobilenumber"]) || empty($_POST["specficproblem"])) {
            ?>
         <script>
			 $(document).ready(function() {
				alert("Please fill the required data");
			 });
		 </script>
			<?php
		} else {
			// Our variables from submitted form
			$errors_string = "";
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$country = $_POST["country"];
			$mobilenumber = str_replace(" ", "", $_POST["mobilenumber"]);
			$specficproblem = $_POST["specficproblem"];
			// Local Validation
			if (strlen($mobilenumber) < 11 || strlen($mobilenumber) > 13) {
				$errors_string .= "invalid mobiel number, ";
			}

			// show error if exist
			if (strlen($errors_string) > 0) {
				?>
				<script>
					$(document).ready(function() {
					   alert("<?php echo $errors_string; ?>");
					});
				</script>
				   <?php
			} else {
				require_once "dbConnection.php";
				if ($is_db_connected == true) {
					$sql = "insert into issues (first_name, last_name, country, phone_number, problem) VALUES ('$fname', '$lname', '$country', '$mobilenumber', '$specficproblem')";
					if ($conn->query($sql) === TRUE) {
						?>
					<script>
						$(document).ready(function() {
						   alert("New record created successfully");
						});
					</script>
					   <?php
					} else {
						?>
					<script>
						$(document).ready(function() {
						   alert("Failed to connect to DB");
						});
					</script>
					   <?php
					}
					$conn->close();
				    $is_db_connected = false;
				} else {
					?>
  <script>
      $(document).ready(function() {
          alert("Failed to conenct to DB, please try again later.");
      });
  </script>
  <?php
				}
			}
		}
	}

	?>

  <h3>Issuing Problem</h3>

  <div class="Contactcontainer">
    <form method="post">
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php if (isset($_POST["fname"])) { echo $_POST["fname"]; } ?>">

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php if (isset($_POST["lname"])) { echo $_POST["lname"]; } ?>">

      <label for="country">Country</label>
      <select id="country" name="country">
        <option value="Egypt">Egypt</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
      </select>
      <label for="mobilenumber">Mobile Number</label>
      <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Write your Mobile Number.." value="<?php if (isset($_POST["mobilenumber"])) { echo $_POST["mobilenumber"]; } ?>">
      <label for="specficproblem">specfic problem</label>
      <textarea id="subject" name="specficproblem" placeholder="Write your specfic problem.." style="height:200px"><?php if (isset($_POST["specficproblem"])) {echo $_post["specficproblem"]; } ?></textarea>
      <input type="submit" value="Submit">
    </form>
  </div>

  
    <?php
	    require_once "footer.php";
	?>
</body>
</html>