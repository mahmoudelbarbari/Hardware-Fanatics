<!DOCTYPE html>
<html>
<head>
    <title>Add New Product </title>
    <?php
        require_once "head.php";
    ?>
</head>

<body>
    <?php
    require_once "header.php";

    if (!empty($_POST)) {
        if (empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["type"]) || count($_FILES) == 0) {
            ?>
            <script>
                $(document).ready(function() {
                   alert("Please fill the required data");
                });
            </script>
               <?php
        } else {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $type = $_POST["type"];

            if (is_uploaded_file($_FILES['selectfile']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['selectfile']['tmp_name']));
                $imageProperties = getimageSize($_FILES['selectfile']['tmp_name']);
                require_once "dbConnection.php";
                if ($is_db_connected == TRUE) {
                    $sql = "INSERT INTO product(name, price, type, img) VALUES('$name', '$price', '$type', '$imgData')";
                    if ($conn->query($sql) == TRUE) {
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
                    $is_db_connected = FALSE;
                } else {
                    ?>
					<script>
						$(document).ready(function() {
						   alert("Failed to connect to DB");
						});
					</script>
					   <?php
                }
            }
        }
    }
    ?>

    <div class="Contactcontainer" style="width: 50%; margin: auto;">
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php if (isset($_POST["name"])) { echo $_POST["name"]; } ?>" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php if (isset($_POST["price"])) { echo $_POST["price"]; } ?>" required>

            <label for="type">Type</label>
            <select class="itemSelect" name="type" required>
                <option value="COOLING">Cooling</option>
                <option value="CPU">CPUs</option>
                <option value="MEMORY">Memory</option>
                <option value="GPU">Graphics Crard</option>
                <option value="MOTHERBOARD">Mother Boadrs</option>
            </select>
            <label for="selectfile">Select a file:</label>
            <input type="file" id="selectfile" name="selectfile" required>
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    require_once "footer.php";
    ?>
</body>
</html>