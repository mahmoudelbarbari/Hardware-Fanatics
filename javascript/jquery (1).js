   // scroll to top done by mohab 183839
   $(document).ready(function(){
            $(".ScrollToTop").click(function(){
            $("html, body").animate({scrollTop : 0}, "slow")});
                
                
                  $(window).scroll(function(){
                
            
                  if($(window).scrollTop() >= 300){
                
                      $(".ScrollToTop").fadeIn(800);
            } 
                
            else 
                 $(".ScrollToTop").fadeOut(400);
            
              
               
                  });
		// adding items top cart done by hady191852
		function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
		 $(".BtnAddToCart").click(function(){

      alert("Added to cart, successfully");
  });
        });