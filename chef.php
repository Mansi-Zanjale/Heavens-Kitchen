<?php

include 'components/connect.php';
include 'chef_header.php';

if(isset($_POST['update_view'])){

   $product_id = $_POST['product_id'];
   $view = $_POST['view'];
   $update_view = $conn->prepare("UPDATE `products` SET view = ? WHERE id = ?");
   $update_view->execute([$view, $product_id]);
   $message[] = 'product view updated';
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<section class="show-products">
<?php
         $category = $_GET['category'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         $fetch_cat=$select_products->fetch(PDO::FETCH_ASSOC); ?>
        <h1 class="title"><?= $fetch_cat['category']; ?></h1>

     <div class="box-container">
     <?php
         $category = $_GET['category'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
               ?>
       
     <form action="" method="post" class="box  <?= $fetch_products['category']; ?> ">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="" >
         <div class="flex">
               <div class="price"><span>₹</span><?= $fetch_products['price']; ?><span>/-</span></div>
               <div class="name"><?= $fetch_products['name']; ?></div>
            </div>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                <select name="view" class="view" style="">
                   <option value="" selected disabled><?= $fetch_products['view']; ?></option>
                   <option value="available" >available</option>
                   <option value="unavailable">unavailable</option>
                </select>
              <div class="flex-btn">
                <input type="submit" value="update" class="btn" name="update_view" onclick="<? $message[] = 'product view updated';?>">
              </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

</section>



</body>
</html>