<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php
         require_once "head.php";
    ?>
    <style>
    form .content input {
        width: 30px;
        height: 30px;
        background: green;
    }
    </style>
</head>

<body>

    <?php
         require_once "header.php";
         if (!empty($_POST)) {
            if (empty($_POST["email"]) || empty($_POST["password"])) {
   ?>
    <script>
    $(document).ready(function() {
        alert("Please fill the required data");
    });
    </script>
    <?php
            } else {
               $email = $_POST["email"];
               $password = $_POST["password"];

               require_once "dbConnection.php";
               if ($is_db_connected == true) {
                  $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                  $result = $conn->query($sql);
                  if ($result->num_rows == 1) {
                     $row = $result->fetch_assoc();
                     $_SESSION['id'] = $row["id"];
                     $_SESSION['email'] = $row["email"];
                     $_SESSION['type'] = $row["type"];

                     if ($_SESSION['type'] == "CUSTOMER") {
                        header("Location: index.php");
                     } else {
                        header("Location: admin.php");
                     }
                  } else {
                     ?>
                  <script>
                      $(document).ready(function() {
                          alert("Wrong username/password");
                      });
                  </script>
              <?php
                  }
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
         } else {

         }
    ?>

    <div class="wrapper">
        <div class="title">
            Login Form
        </div>

        <form method="post">
            <div class="field">
                <input type="text" name="email" required>
                <label for="email">Email Address</label>
            </div>

            <div class="field">
                <input type="password" name="password" required>
                <label for="password">Password</label>
            </div>

            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>

                <div class="pass-link">
                    <a href="forgetpass.php">Forgot password?</a>
                </div>
            </div>

            <div class="field">
                <input type="submit" value="Login">
            </div>

            <div class="signup-link">
                Not a member? <a href="register.php">Sign up now</a>
            </div>
        </form>
    </div>

    <?php
    require_once "footer.php";
?>
</body>

</html>