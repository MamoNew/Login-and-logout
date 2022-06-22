<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris Yap</title>
    <link  rel='stylesheet' href="css/main.css">
</head>

<!------------------------------------------------------------------------------------------------------>

<body id="go2">

<div class="main">

 <h1>Giris Yap</h1> 

 <i>Hos Geldiniz</i><br>
<image src="images/profile.png" alt="Trulli" width="97" height="47"> 
<form  action="login.php" method="POST">
<?php

if(isset($user_error)){
    echo $user_error;
}
?>

<input type="text"  name="username"  id="username" placeholder="Kullanci"   value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>"><br>

<?php

if(isset($pass_error)){
    echo $pass_error;
}
?>
<input type="password"  name="password"  id="password" placeholder="Sefere"   value=" <?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>  "><br>


<label></label><input type="checkbox" name="" id="keep" value="1" >Keep me signed in</lable><br>


<input type="submit"  name="submit"  id="submit" placeholder="Kullanci"><br>
</form>
<a href=""> forget password? </a>

<h3>Yada</h3><br>
<a  id='login' href="register.php">Kayd Olll</a>
</div>
</body>
</html>