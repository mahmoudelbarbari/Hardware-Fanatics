<!DOCTYPE html>
<html>

<head>
    <title>View Users</title>
    <?php
        require_once "head.php";
    ?>

    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>

</head>

<body>

    <?php
	    require_once "header.php";
        require_once "dbConnection.php";
            if ($is_db_connected == TRUE) {
                $sql = "SELECT * FROM user WHERE type ='CUSTOMER';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    echo '<table id="customers">';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Full Name</th>';
                    echo '<th>Username</th>';
                    echo '<th>Phone Number</th>';
                    echo '<th>Email</th>';
                    echo '</tr>';
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $fullname = $row['full_name'];
                        $username = $row['username'];
                        $phonenumber = $row['phone_number'];
                        $email = $row['email'];

                        echo '<tr>';
                        echo "<td>$id</td>";
                        echo "<td>$fullname</td>";
                        echo "<td>$username</td>";
                        echo "<td>$phonenumber</td>";
                        echo "<td>$email</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<h3 style="text-align: center;">No users were found</h3>';
                }
            }

    require_once "footer.php";
    ?>
</body>

</html>