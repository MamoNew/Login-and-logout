<?php
session_start();
include('inc/connections.php');
if(isset($_POST['username'])&& isset($_POST['password'])){
    $username= stripcslashes(strtolower($_POST['username']));
    $md5_pass   = md5($_POST['password']);
    $username=filter_input(INPUT_POST,'username');
    //$password= stripcslashes(strtolower($_POST['password']));
    $username= htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $password= htmlentities(mysqli_real_escape_string($conn,$_POST['password']));

     if(isset($_POST['keep'])){              //cookies islemleri
        $keep=htmlentities(mysqli_real_escape_string($conn,$_POST['keep']));
        if($keep==1){
          setcookie('username' , $username,time()+3600,"/");
          setcookie('password' , $password,time()+3600,"/");
        }
     }
}
if(empty($username)){
        $user_error='<p id="error"> Please enter username<p> ';       //username
        $err_s=1;
}
if(empty($password)){
            $pass_error='<p id="error">Please enter password<p> ';   // password
            $err_s=1;
             include('index.php');
  }
if(!isset($err_s)){
    $sql= "SELECT id,username,password FROM users WHERE username='$username' AND md5_pass ='$md5_pass' limit 1";
    $result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);           //mysqli_fetch_array


    if($row['username']===$username && $row['password']===$password){
        $_SESSION['username']= $row['username'];
        $_SESSION['id'] = $row['id'];
        header('location:home.php');
        exit();
    }   
    else{

        $user_error='<p id="error">Wrong password or users pleas try again<p>'; 
        include('index.php');
        exit();

    }
    

} 


?>
