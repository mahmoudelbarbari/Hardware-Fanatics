<?php
require_once "dbConnection.php";
if ($is_db_connected == true) {
    $sql = "SELECT * FROM product WHERE type = '$type'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<div class="ProdContianer">';
        while($row = $result->fetch_assoc()) {
            $image_data = base64_encode($row['img']);
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];

            echo '<div class="Prod_Items">';
            echo '<div class="ProdImg">';
            echo "<img src='data:image/jpg;charset=utf8;base64,$image_data' alt='cooler1 picture' class='ProductImgSize'>";
            echo '</div>';
            echo '<div class="ProdDescription">';
            echo "<b>$name</b><br />";
            echo '<div class="itemSelect">';
            echo "Price : $ $price";
            echo '</div>';
            echo '<label>Qty:</label>';
            echo '<select class="itemSelect">';
            echo '<option>1</option>';
            echo '<option>2</option>';
            echo '<option>3</option>';
            echo '</select><br />';
            echo "<button data-id='$id' class='BtnAddToCart'>Add to Cart</button>";
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<h5 style='text-align: center;'>No items were found $type</h5>";
    }
    $conn->close();
} else {
?>
    <script>
        $(document).ready(function() {
            alert("Failed to conenct to DB, please try again later.");
        });
    </script>
<?php
}
?>