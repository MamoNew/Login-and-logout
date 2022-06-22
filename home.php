<?php
session_start();
include('inc/connections.php');

if(isset($_SESSION['id']) && isset($_SESSION['username']))
{
   $id= $_SESSION['id'];
   $user=$_SESSION['username'];


   $info= mysqli_query($conn,"select * from users where username='$user'");
   while($data = mysqli_fetch_array($info)){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnaSayfa</title>
    <link  rel='stylesheet' href="css/main.css">

</head>
<body style="background-color=red">                  <!-- home page color-->

<a href="logout.php">Cikis Yap</a>

<div >
      <?php  echo "<image  id='go4' src='images/".$data['profile_picture']."' alt='image Not found :( '>";?>
</div>


    <h1>WebTicari Yazilim'e Hos geldiniz    <?php echo $user  ?> 🤩🤩</h1>
</body>
</html>

<?php
}

}else{

    header('location:index.php');

    exit();
}


?>
