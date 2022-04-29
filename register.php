<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <?php
         require_once "head.php";
    ?>
    <style>
    .buttons>.container>.btn.effect01:nth-child(2) {
        display: none;
    }
    </style>
</head>

<body>
    <?php
         require_once "header.php";

	
	if (!empty($_POST)) {
		if (
         empty($_POST["fullname"]) || 
         empty($_POST["username"]) || 
         empty($_POST["password"]) || 
         empty($_POST["phoneNumber"]) || 
         empty($_POST["email"]) || 
         empty($_POST["confirmPassword"]) ||
         empty($_POST["terms"])
         ) {
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
			$fullname = $_POST["fullname"];
			$username = $_POST["username"];
			$password = $_POST["password"];
         $confirm_password = $_POST["confirmPassword"];
         $phone_number = $_POST["phoneNumber"];
         $email = $_POST["email"];
         $term = $_POST["terms"];
			// Local Validation
         if ($term != "on") {
            $errors_string .= "must accept privacy policy, ";
         }
			if (strlen($phone_number) < 11 || strlen($phone_number) > 13) {
				$errors_string .= "invalid mobiel number, ";
			}
         if ($password != $confirm_password) {
            $errors_string .= "password must match, ";
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
					$sql = "insert into user (full_name, username, password, phone_number, email) VALUES ('$fullname', '$username', '$password', '$phone_number', '$email')";
               $query_result = FALSE;
               $db_error = "";
               try {
                  $query_result = $conn->query($sql);
               } catch (Exception $ex) {
                  $db_error = $ex->getMessage();
               }
					if ($query_result === TRUE) {
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
        alert("<?php echo $db_error; ?>");
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
    <div class="wrapper">
        <div class="title">
            Register Form
        </div>
        <form method="post">
        <div class="field">
                <input type="text" name="fullname"
                    value="<?php if (isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?>" required>
                <label for="fullname">FullName</label>
            </div>
            <div class="field">
                <input type="text" name="username"
                    value="<?php if (isset($_POST["username"])) { echo $_POST["username"]; } ?>" required>
                <label for="username">Username</label>
            </div>
            <div class="field">
                <input type="text" name="phoneNumber"
                    value="<?php if (isset($_POST["phoneNumber"])) { echo $_POST["phoneNumber"]; } ?>" required>
                <label for="phoneNumber">Number</label>
            </div>
            <div class="field">
                <input type="text" name="email" value="<?php if (isset($_POST["email"])) { echo $_POST["email"]; } ?>"
                    required>
                <label for="email">Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password"
                    value="<?php if (isset($_POST["password"])) { echo $_POST["password"]; } ?>" required>
                <label for="password">Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirmPassword"
                    value="<?php if (isset($_POST["confirmPassword"])) { echo $_POST["confirmPassword"]; } ?>" required>
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <div class="content">
                <input type="checkbox" name="terms" id="label" required <?php if (isset($_POST["terms"]) && $_POST["terms"] == "on") { echo "checked"; } ?>>
                <label for="terms">By signing up, you agree to our <a href="terms.php">Terms and Condition</a> and our
                    <a href="privacy.php">Privacy Policy</a></label>
            </div>
            <div class="field">
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
    <?php
         require_once "footer.php";
    ?>
</body>

</html>