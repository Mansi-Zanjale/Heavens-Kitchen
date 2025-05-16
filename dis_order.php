<?php 

include 'chef_header.php';
include 'components/connect.php';



?>

<?php

if (isset($_GET['complete_order'])) {
    $order_id = $_GET['complete_order'];
    $update_order = $conn->prepare("UPDATE orders SET state = 'completed' WHERE id = ?");
    $update_order->execute([$order_id]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
<section class="placed-orders">

<h1 class="heading">placed orders</h1>

<div class="box-container">

<?php
   $select_orders = $conn->prepare("SELECT * FROM orders WHERE state = 'pending'");
   $select_orders->execute();
   if($select_orders->rowCount() > 0){
      while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
?>
<div class="box">
   <p> order id : <span><?= $fetch_orders['id']; ?></span> </p>
   <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
   <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
   <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
   <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
   <p> total price : <span>₹<?= $fetch_orders['total_price']; ?>/-</span> </p>
   <button class="btn" onclick="removeBox(this)"> completed</button>
</div>
<?php
   }
}else{
   echo '<p class="empty">no orders placed yet!</p>';
}
?>

</div>

</section>

<script>
function removeBox(btn) {
    var box = btn.parentNode;
    var orderId = box.querySelector('p span:first-child').textContent;
    box.style.display = 'none';
    window.location.href = 'dis_order.php?complete_order=' + orderId;
}
</script>
</body>
</html>