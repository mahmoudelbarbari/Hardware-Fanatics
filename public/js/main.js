// scroll to top done by mohab 183839
$(document).ready(function () {
  $(".ScrollToTop").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });

  $(window).scroll(function () {
    if ($(window).scrollTop() >= 300) {
      $(".ScrollToTop").fadeIn(800);
    } else {
      $(".ScrollToTop").fadeOut(400);
    }
  });

  // adding items top cart done by hady191852
  $(".BtnAddToCart").click(function () {
    alert("Added to cart, successfully");
  });
});

// read more/less done by Ahmed hany 185573
function didClickReadMoreButton() {
  const isHidden = document.getElementById("hiddenPara").hidden;
  document.getElementById("hiddenPara").hidden = !isHidden;
  if (isHidden) {
    document.getElementById('myBtn').innerText = "Read less";
  } else {
    document.getElementById('myBtn').innerText = "Read more";
  }
}

function selectActiveNavigationItem() {
  $("header > nav > ul").children().children().toArray().forEach(function(element) {
    if (element.href == window.location.href) {
        element.classList = "active";
    }
});
}