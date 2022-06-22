<?php
$error='';
if(isset($_POST['submit'])){
   if(empty($_POST['user']) || empty($_POST['pass'])){
    $error="Username or password is invalid";
   }

   else{
   // user and pass
       $user=$_POST['user'];
       $pass=$_POST['pass'];
       $nowTimeStamp = date("Y-m-d H:i:s");
       $conn=mysqli_connect("localhost","root","");
       $db=mysqli_select_db($conn,"database");
      $query=mysqli_query($conn," SELECT * FROM userpass WHERE pass='$pass' AND (user='$user'
                                      OR email='$user' ) ");

      $rows=mysqli_num_rows($query);

      if($rows==1){
        header('Location:welcome.php');
     }
      else{
        
        $error="Username or password is not correct";
      }
      
       
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="style.css">
    <title>Login form</title>
</head>
<style>
h1{
  text-align: center;
}

.login{
  width:360px;
  margin:50px auto;
  font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
  border-radius:10px;
  border:2px solid #ccc;
  padding:10px 40px 25px;
  margin-top:70px;
}
input[type=text] , input[type=password],input[type=email],input[type=number],input[type=date]{
  width:99%;
  padding:10px;
  margin-top:8px;
  border:1px solid #ccc;
  padding-left:5px;
  font-size:16px;
  font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit]{
  width:100%;
  background-color:#009;
  color:#fff;
  border:2px solid #06F;
  padding:10px;
  font-size:20px;
  cursor:pointer;
  border-radius:5px;
  margin-bottom:15px; 
}
</style>
<body>
    <div class="login">
        <h1> Login </h1>
          <form action="" method="POST" style="text-align:center;">
          <input type="text" placeholder="Username or Email" id="user" name="user"><br></br>
          <input type="password" placeholder="Password" id="pass" name="pass"><br></br>
          <input type="submit" value="Login" name="submit">
        </form>
        <span>
            New User ? <a href=register.php style="color:#963dd5;">Click here </a>
</span>
        <span>
        <?php echo $error;?>
    </span>
    </div>

</body>
</html>