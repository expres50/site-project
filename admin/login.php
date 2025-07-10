<?php

include '../config.php';
 session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    $msg = "";
 

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Admin login</title>
      <!-- CSS -->
      <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #f2f2f2;

}
::selection{
  background: #4158d0;
  color: #fff;
}
.wrapper{
  width: 380px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  line-height: 100px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: #1974d2;
}
.wrapper form{
  padding: 10px 30px 50px 30px;
}
.wrapper form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.wrapper form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.wrapper form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: #1974d2;
  transition: all 0.3s ease;
}
form .field input[type="submit"]:hover{
    background-color: blue;
}
form .field input[type="submit"]:active{
  transform: scale(0.95);
}
.alert{
    background-color: red;
    border-radius: 2px;
    text-align: center;
}

      </style>

   </head>
   <body>

   <?php 

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email='animanalfred@gmail.com' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        
            $row = mysqli_fetch_assoc($result);
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: index.php");
        } else {
        $msg = "<div class='alert'>Quelque chose s'est mal passé.</div>";
    }
    }

?>   
   
   
   <div class="wrapper">
         <div class="title">
            Admin login
         </div>
         <?php echo $msg; ?>
         <form  method="POST">
            <div class="field">
               <input name="email" type="email" required>
               <label>Email</label>
            </div>
            <div class="field">
               <input name="password" type="password" required>
               <label>Mot de passe</label>
            </div>
            <div class="field">
               <input name="submit" type="submit" value="Connexion">
            </div>
            
         </form>
      </div>
   </body>
</html>