<!DOCTYPE html>
<html>

<head>
    <title>Update Product</title>
    <?php
        require_once "head.php";
    ?>
</head>

<body>
    <?php
    require_once "header.php";
    require_once "dbConnection.php";

    $name = "";
    $price = "";
    $id = "";

    if (!empty($_POST)) {
        if (empty($_POST["id"]) || empty($_POST["name"]) || empty($_POST["price"])) {
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
            $id = $_POST["id"];

            if (count($_FILES) > 0) {
                if ($_FILES['selectfile']['size'] == 0) {
                    if ($is_db_connected == TRUE) {
                        $sql = "UPDATE product SET name = '$name', price = '$price' WHERE id = '$id'";
                        if ($conn->query($sql) == TRUE) {
                        ?>
                            <script>
                                $(document).ready(function() {
                                    alert("Record updated successfully");
                                });
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                $(document).ready(function() {
                                   alert("Failed to update record");
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
                } else {
                    if (is_uploaded_file($_FILES['selectfile']['tmp_name'])) {
                        $imgData = addslashes(file_get_contents($_FILES['selectfile']['tmp_name']));
                        if ($is_db_connected == TRUE) {
                            $sql = "UPDATE product SET name = '$name', price = '$price', img = '$imgData' WHERE id = '$id'";
                            if ($conn->query($sql) == TRUE) {
                            ?>
                                <script>
                                    $(document).ready(function() {
                                        alert("Record updated successfully");
                                    });
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    $(document).ready(function() {
                                       alert("Failed to update record");
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
            } else {
                if ($is_db_connected == TRUE) {
                    $sql = "UPDATE product SET name = '$name', price = '$price' WHERE id = '$id'";
                    if ($conn->query($sql) == TRUE) {
                    ?>
                        <script>
                            $(document).ready(function() {
                                alert("Record updated successfully");
                            });
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            $(document).ready(function() {
                               alert("Failed to update record");
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
    } else {
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            require_once "dbConnection.php";
            if ($is_db_connected == TRUE) {
                $sql = "SELECT * FROM product WHERE id = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $price = $row["price"];
                } else {
                    ?>
                      <script>
                          $(document).ready(function() {
                              alert("Wrong product id");
                          });
                      </script>
                  <?php
                }
            } else {
                ?>
                <script>
                    $(document).ready(function() {
                       alert("Failed to retrieve record from DB");
                    });
                </script>
                   <?php
            }
        } else {
        ?>
            <script>
                $(document).ready(function() {
                    alert("You need to provide an ID for this operation");
                });
            </script>
        <?php
        }
    }
    ?>

    <div class="Contactcontainer" style="width: 50%; margin: auto;">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="id" style='display: none;' value="<?php if (isset($_GET["id"])) { echo $_GET["id"]; } ?>">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php if (isset($name)) { echo $name; } ?>">

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php if (isset($price)) { echo $price; } ?>">

            <label for="selectfile">Select a file:</label>
            <input type="file" id="selectfile" name="selectfile">
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    require_once "footer.php";
    ?>
</body>

</html>