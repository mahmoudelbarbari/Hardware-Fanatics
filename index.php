<!DOCTYPE HTML>
<html>

<head>
  <title> Hardware Fanatics </title>
  <?php
         require_once "head.php";
    ?>
</head>

<body>

<?php
         require_once "header.php";
    ?>
  <div class="sidenav">
    <a href="cooling.php">Cooling</a>
    <a href="cpus.php">CPUs</a>
    <a href="memory.php">Memory</a>
    <a href="graphicscard.php">Graphics</a>
    <a href="motherboards.php">MotherBoards</a>
  </div>
  </div>

  <!-- slide show part -->
  <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <img src="Images/banner1.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 5</div>
      <img src="Images/banner2.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 5</div>
      <img src="Images/banner3.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 5</div>
      <img src="Images/banner4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div class="numbertext">5 / 5</div>
      <img src="Images/banner5.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div>

  <br>

  <script>
    // slidw show done by mahmoud182903
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      slideIndex += n;
      showSlides(slideIndex);
    }

    function currentSlide(n) {
      slideIndex = n;
      showSlides(slideIndex);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) { slideIndex = slides.length }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
    }
    function autoSeek() {
      plusSlides(1);
      setTimeout(autoSeek, 5000);
    }
    autoSeek();
  </script>
  <!-- end of slideshow part -->

  <div class="servicesSection">
    <span class="sectionSubtitle">Offering</span>
    <h2 class="sectionTitle">Our amazing services</h2>

    <div class="servicesContainer">
      <div class="servicesContent">
        <img src="Images/gear.png" alt="gear Icon" class="servicesImg">
        <h3 class="servicesTitle">Pc Components</h3>
        <p class="servicesDescription">We offer the greatest in PC technology</p>
      </div>

      <div class="servicesContent">
        <img src="Images/pc.jpg" alt="pc Icon" class="servicesImg">
        <h3 class="servicesTitle">Everthing you like</h3>
        <p class="servicesDescription">We offer all kinds of PC Components you desire, just shop at our place.</p>
      </div>

      <div class="servicesContent">
        <img src="Images/delivery.jpeg" alt="Delivery Icon" class="servicesImg">
        <h3 class="servicesTitle">Delivery</h3>
        <p class="servicesDescription">We offer our clients excellent delivery serivce all around cario 24/7, and you
          can checkout with credit card 'Cashless order', your safty is our priority.</p>
      </div>
    </div>

    <?php
         require_once "footer.php";
    ?>
</body>
</html>