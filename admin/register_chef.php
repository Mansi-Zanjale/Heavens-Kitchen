<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   
   $email = $_POST['email'] ;
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);

   $address = $_POST['address'] ;
   $address = filter_var($address, FILTER_SANITIZE_STRING);

 

//    $pass = sha1($_POST['pass']);
//    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
//    $cpass = sha1($_POST['cpass']);
//    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_chef = $conn->prepare("SELECT * FROM chef WHERE name = ?");
   $select_chef->execute([$name]);
   
   if($select_chef->rowCount() > 0){
      $message[] = 'username already exists!';
   }
//    else{
//       if($pass != $cpass){
//          $message[] = 'confirm passowrd not matched!';
//       }
      else{
         $insert_chef = $conn->prepare("INSERT INTO chef(name,email,category,number,address) VALUES(?,?,?,?,?)");
         $insert_chef->execute([$name, $email, $category, $number, $address]);
         $message[] = 'new chef registered!';
      }
   }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>register new</h3>
      <input type="text" name="name" maxlength="20" required placeholder="enter your chef name" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="category" maxlength="20" required placeholder="enter chef's category" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="email" name="email" maxlength="50" required placeholder="enter chef's email" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="number" name="number" maxlength="10" required placeholder="enter your number" class="box"  oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="address" maxlength="50" required placeholder="enter your address" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register admin section ends -->
















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>