<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_dboy = $conn->prepare("DELETE FROM dboy WHERE id = ?");
   $delete_dboy->execute([$delete_id]);
   header('location:dboy_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delivery Boy accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admins accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Delivery Boy account</h1>

   <div class="box-container">

   <div class="box">
      <p>register new Delivery Boy</p>
      <a href="register_dboy.php" class="option-btn">register</a>
   </div>

   <?php
      $select_account = $conn->prepare("SELECT * FROM dboy");
      $select_account->execute();
      if($select_account->rowCount() > 0){
         while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <p> DBoy id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> DBoy name : <span><?= $fetch_accounts['name']; ?></span> </p>
      <p> DBoy number : <span><?= $fetch_accounts['number']; ?></span> </p>
      <p> DBoy address : <span><?= $fetch_accounts['address']; ?></span> </p>
      <div class="flex-btn">
         <a href="dboy_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">delete</a>
         <!-- <?php
            if($fetch_accounts['id'] == $admin_id){
               echo '<a href="update_profile.php" class="option-btn">update</a>';
            }
         ?> -->
      </div>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no accounts available</p>';
   }
   ?>

   </div>

</section>

<!-- admins accounts section ends -->




















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>