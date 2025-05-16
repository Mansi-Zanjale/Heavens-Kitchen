<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){   
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>


<div class="sliderr">
        <div class="slide">
          <div class="image">
            <img src="photo/burger-1.png" alt="Image 1">
          </div>
          <div class="text">
            <h1>  _Handmade goodness_</h1>
            <h2>We belive in taste.</h2>
           <button> <a href="menu.php"> see menus </a></button>
          </div>
        </div>
        
        <div class="slide">
          <div class="image">
            <img src="photo/dessert-2.png" alt="Image 2">
          </div>
          <div class="text">
            <h1>_Handmade goodness_</h1>
            <h2>We belive in taste.</h2>
            <button> <a href="menu.php">see menus</a></button>
          </div>
        </div>

        <div class="slide">
            <div class="image">
              <img src="photo/drink-1.png" alt="Image 2">
            </div>
            <div class="text">
              <h1> _Handmade goodness_</h1>
              <h2>We belive in taste.</h2>
              <button> <a href="menu.php">see menus</a></button>
            </div>
          </div>
        
        <div class="slide">
          <div class="image">
            <img src="photo/dish-1.png" alt="Image 3">
          </div>
          <div class="text">
            <h1> _Handmade goodness_</h1>
            <h2>We belive in taste.</h2>
            <button> <a href="menu.php">see menus</a></button>
          </div>
        </div>
      </div>

<section class="category">

   <h1 class="title">food category</h1>

   <div class="box-container">

      <a href="category.php?category=fast_food" class="box">
         <img src="images/cat-1.png" alt="">
         <h3>fast food</h3>
      </a>

      <a href="category.php?category=main_dish" class="box">
         <img src="images/cat-2.png" alt="">
         <h3>main dishes</h3>
      </a>

      <a href="category.php?category=drinks" class="box">
         <img src="images/cat-3.png" alt="">
         <h3>drinks</h3>
      </a>

      <a href="category.php?category=desserts" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>desserts</h3>
      </a>

   </div>

</section>




<section class="products">

   <h1 class="title">latest dishes</h1>

   <div class="box-container ">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id DESC LIMIT 8");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box <?= $fetch_products['category']; ?> ">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="" style="border:<?php if($fetch_products['view']=='unavailable'){echo '2.5rem solid grey';}; ?>">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
         <span>QTY</span>
         <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" maxlength="2">
         </div>
            <div class="price"><span>₹</span><?= $fetch_products['price']; ?></div>
            <?php if($fetch_products['view']=='unavailable'){echo '<div class="temp">Currently<br> unavailable</div> ';}else{ echo '<button type="submit" name="add_to_cart" class="add">Add To Cart</button>';};?>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">veiw all</a>
   </div>

</section>



<?php include 'components/footer.php'; ?>


<!-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> -->

<script src="js/script.js"></script>



</body>
</html>