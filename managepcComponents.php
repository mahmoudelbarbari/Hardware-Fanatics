<!DOCTYPE HTML>
<html>
<head>

    <title> Manage PC Components</title>
    <?php
         require_once "head.php";
    ?>

</head>

<body>

    <?php
        require_once "header.php";
        ?>


    <br>
    <br>
    <br>

    <div class="ProductsContainer">
        <a href="coolingAd.php">
            <div class="categories">
                <img src="Images/cooling.jpg" alt="Cooling picture" class="itemImg">
                <div class="ImgTitle">Cooling</div>
            </div>
        </a>
        <a href="cpusAd.php">
            <div class="categories">
                <img src="Images/CPUBanner.jpg" alt="CPUs picture" class="itemImg">
                <div class="ImgTitle">CPUs</div>
            </div>
        </a>
        <a href="memoryAd.php">
            <div class="categories">
                <img src="Images/memorybanner.jpg" alt="Memory picture" class="itemImg">
                <div class="ImgTitle">Memory</div>
            </div>
        </a>
        <a href="graphicscardAd.php">
            <div class="categories">
                <img src="Images/GPUbanner.jpg" alt="Graphics picture" class="itemImg">
                <div class="ImgTitle">Graphics Card</div>
            </div>
        </a>
        <a href="motherboardsAd.php">
            <div class="categories">
                <img src="Images/Motherboardsbanner.jpg" alt="MotherBoards" class="itemImg">
                <div class="ImgTitle">MotherBoards</div>
            </div>
        </a>
    </div>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>