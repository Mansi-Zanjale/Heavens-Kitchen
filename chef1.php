<?php 
include 'components/connect.php';
session_start();

if(isset($message)){
  foreach($message as $message){
     echo '
     <div class="message">
        <span>'.$message.'</span>
        <i class="cross" onclick="this.parentElement.remove();"> X </i>
     </div>
     ';
  }
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chef page</title>
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
    <section class="show-products">
      <h1>Chef Screen</h1>
      <div class="box-container">
        <?php

        $show_products = $conn->prepare("SELECT * FROM `products`");
        $show_products->execute();
        if($show_products->rowCount() > 0){
           while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
          
            ?>
        <div class="box">
            <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
            <div class="flex">
               <div class="price"><span>$</span><?= $fetch_products['price']; ?><span>/-</span></div>
               <div class="name"><?= $fetch_products['name']; ?></div>
            </div>
            <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                <select name="view" class="view" style="">
                   <option value="available" selected>available</option>
                   <option value="unavailable">unavailable</option>
                </select>
              <div class="flex-btn">
                <input type="submit" value="update" class="btn" name="update_view" onclick="<? $message[] = 'product view updated';?>">
              </div>
            </form>
        </div>
      <?php 
           }
          }
      ?>
      </div>
    </section>
</body>
</html>