<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>about us</h3>
   <p><a href="home.php">home</a> <span> / about</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>At Heavens Kitchen, we bring restaurant-quality meals right to your doorstep, offering a convenient, hassle-free dining experience. Our expert chefs use the freshest ingredients to prepare every dish with care, ensuring each order is packed with flavor and quality. With a diverse menu that caters to a variety of tastes and dietary preferences, we make sure there’s something for everyone. Plus, with fast and reliable delivery, you can enjoy your favorite meals from the comfort of your home, without compromising on taste or service. Choose us for a seamless, delicious dining experience, anytime, anywhere!</p>
         <a href="menu.html" class="btn">our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Browse Our Menu</h3>
         <p>Start by exploring our wide range of delicious dishes, from appetizers to main courses and desserts. Take your time to go through our categories and find exactly what you're craving.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Fast & Reliable Delivery</h3>
         <p> Once your order is placed, our dedicated delivery team will make sure your meal reaches you quickly. We prioritize freshness and speed to ensure your food arrives hot and on time.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Enjoy Your Meal</h3>
         <p>Sit back, relax, and let us handle the rest! Your freshly prepared meal will be delivered promptly, ready to be enjoyed from the comfort of your home.Feel free to leave a review or share your experience with us!</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">customer's reivews</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slid">
            <img src="images/pic-1.png" alt="">
            <p>"Absolutely amazing food! The Flavors were incredible, and everything arrived hot and fresh. I’ll definitely be ordering again soon!" </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Vikram S</h3>
         </div>

         <div class="swiper-slide slid">
            <img src="images/pic-2.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Sneha M.</h3>
         </div>

         <div class="swiper-slide slid">
            <img src="images/pic-3.png" alt="">
            <p>"The delivery was super-fast, and the food was still steaming when it got here. The variety on the menu is impressive, and I love the customizations. Highly recommend!" </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Krishna Patel</h3>
         </div>

         <div class="swiper-slide slid">
            <img src="images/pic-3.png" alt="">
            <p>"I’ve tried several online food services, but this one is by far the best. Consistent quality, great portion sizes, and the food always tastes like it was made just for me." </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Harsh Z</h3>
         </div>

         <div class="swiper-slide slid">
            <img src="images/pic-5.png" alt="">
            <p>"Loved how easy the ordering process was, and the real-time tracking is a nice touch. My meal was delivered within 30 minutes, and it tasted amazing. Keep up the great work!" </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Sudarshan G</h3>
         </div>

         <div class="swiper-slide slid">
            <img src="images/pic-6.png" alt="">
            <p>"Fast, reliable, and delicious! Every order I’ve placed has been perfect, and the customization options are great. Highly recommend for anyone who loves great food delivered right to their door." </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>–Nilam Gurav</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->



<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>