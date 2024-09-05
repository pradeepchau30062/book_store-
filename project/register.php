<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}
?>


<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>register</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="login.css">
     <!-- <link rel="stylesheet" href="message.css"> -->
     <!-- <link rel="stylesheet" href="style.css"> -->
     <style>
      @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
      *
   {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Quicksand', sans-serif;
   }
   body 
   {
     display: flex;
     justify-content: center;
     align-items: center;
     min-height: 100vh;
     background: #000;
   }
   section 
   {
     position: absolute;
     width: 100vw;
     height: 100vh;
     display: flex;
     justify-content: center;
     align-items: center;
     gap: 2px;
     flex-wrap: wrap;
     overflow: hidden;
   }
   section::before 
   {
     content: '';
     position: absolute;
     width: 100%;
     height: 100%;
     background: linear-gradient(#000,#0f0,#000);
     animation: animate 5s linear infinite;
   }
   @keyframes animate 
   {
     0%
     {
       transform: translateY(-100%);
     }
     100%
     {
       transform: translateY(100%);
     }
   }
   section span 
   {
     position: relative;
     display: block;
     width: calc(6.25vw - 2px);
     height: calc(6.25vw - 2px);
     background: #181818;
     z-index: 1;
     transition: 1.5s;
   }
   section span:hover 
   {
     background: #0f0;
     transition: 0s;
   }
   @media (max-width: 900px)
   {
     section span 
     {
       width: calc(10vw - 2px);
       height: calc(10vw - 2px);
     }
   }
   @media (max-width: 600px)
   {
     section span 
     {
       width: calc(20vw - 2px);
       height: calc(20vw - 2px);
     }
   }
   .message {
    position: absolute;
    top:35px;
    margin:0 auto;
    width: 500px;
    background-color: var(--white);
    padding:2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 10000;
    gap:1.5rem;
    background-color: #0f0;
    border-radius:30px ;
 }
 
.message span{
    font-size: 2rem;
    color:var(--black);
 }
 
 .message i{
    cursor: pointer;
    color:var(--red);
    font-size: 2.5rem;
 }
 
 .message i:hover{
    transform: rotate(90deg);
 }
   
     </style>
 </head>

 <body>
    
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

      <div class="form-container">
         <form action="" method="post">
            <h3>Registeration</h3>
             <input type="text" name="name" placeholder="Enter your name" required class="box">
             <input type="email" name="email" placeholder="Enter your email" required class="box">
             <input type="password" name="password" placeholder="Enter your password" required class="box">
             <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
             <select name="user_type" class="box">
                <option value="user">User</option>
                <option value="admin">Admin</option>
             </select>
             <input type="submit" name="submit" value="register now" class="btn">
           <p>Already have an account?<a href="login.php">Login</a></p>
            
         </form>
     </div>
     <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

 
</section>
 </body>

 </html>