<?php
session_start();
include('../Model/db.php');
$DB = new Db();

if(isset($_POST['submit']) && $_POST['submit'] =='login')
{
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $Query = "SELECT * FROM Users WHERE email='$email' AND password='$password' ";
    $result = $DB->fetch_result($Query);
    $count = sizeof($result);
    if($count == 1)
    {   
        $_SESSION['status']="ok";
        header("Location:../index.php");
    }

}

?>

<style>
.log_slider{
        
    margin:60px 0 60px 815px ;    
}
.log_slider a
{
    text-decoration: none;
    width: 250px;
    height: 60px;
    background-color: rgb(17,126,138);
    color:white;
    padding: 15px;
    text-align: center;
    border: 10px solid gray;
}

.login_form{
    width: 350px;
    height: auto;
    background-color: rgb(247, 88, 19);
    padding: 100px 60px 0 70px;
    margin-left: 700px;
    border: 5px solid rgb(247, 88, 19);
    border-radius: 5px ;
    
}
.login_form label{
    color:white;
    text-transform: capitalize;
    font-weight: bolder;
    
}
.login_form input{
    width: 320px;
    padding: 10px;
    margin:5px 0;
}
.login_form .btn{
   width: 150px;
   height: 50px;
   margin: 20px 90px;
   background-color: green;
   color:wheat;
   font-weight: bold;
   text-transform: uppercase;
}
.logo img{
    width: 150px;
    height: 150px;
    margin: 0 0 -70px 860px ;
    border: 10px solid rgb(247, 88, 19) ;
    border-radius: 50%;
    

}

</style>

<div class="log_slider">
<a href="LogingSystem.php" >LOGIN</a>
<a href="Register.php">REGISTER</a>
</div>

<div class="logo">
    <img src="
    wallet.png" alt="">
</div>
<div class="login_form">

    <form action="<?php echo $_SERVER['PHP_SELF'] ;?> " method="POST" enctype="multipart/form-data">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="passwor">Password</label>
        <input type="password" name="password">

        <input type="submit" name="submit" value="login" class="btn">
    </form>
</div>


