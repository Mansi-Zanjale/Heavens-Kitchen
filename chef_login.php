<?php
include 'components/connect.php';

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $stored_username = 'chef';
        $stored_password = password_hash('maas', PASSWORD_DEFAULT);
        
        if($username === $stored_username && password_verify($password, $stored_password))
        {
            echo "Login Successfull! Welcome, $username";
            header('location:dis_order.php');
            exit; // Add this to prevent the rest of the code from running
        }
        else{
            $message[] = ' Invalid Username or Password.';
        }
    }
    else
    {
        $message[] = 'Please fill in both username and password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<section class="form-container">

   <form action="" method="POST">
      <h3>login now</h3>
      <input type="text" name="username" maxlength="20" required placeholder="enter your username" class="box">
      <input type="password" name="password" maxlength="20" required placeholder="enter your password" class="box">
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>


</body>
</html>