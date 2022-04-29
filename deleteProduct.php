<!DOCTYPE HTML>
<html>
<head>
        <?php 
        start_session();
        require_once "head.php"; 
        ?>
</head>
<body>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    require_once "dbConnection.php";
    $sql = "DELETE FROM product WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        ?>
        <h1 style='text-align: center; color: green;'>Deleted successfully</h1>
        <p style='text-align: center;'>You will be redirected to previous page in 5 seconds</p>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    history.back();
                }, 5000);
            });
        </script>
        <?php
    } else {
        ?>
        <h1 style='text-align: center; color: red;'>Failed to be deleted</h1>
        <p style='text-align: center;'>You will be redirected to previous page in 5 seconds</p>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    history.back();
                }, 5000);
            });
        </script>
        <?php
    }
} else {
    ?>
        <h1 style='text-align: center; color: yellow;'>Id is required for this operation</h1>
        <p style='text-align: center;'>You will be redirected to previous page in 5 seconds</p>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    history.back();
                }, 5000);
            });
        </script>
        <?php
}
?>
</body>
</html>