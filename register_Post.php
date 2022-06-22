<?php

include('inc/connections.php');


if(isset($_POST['submit'])){
    $err_s= 0;
    
    $username= stripcslashes($_POST['username']);  // for security no one can hack the log in 
    $email= stripcslashes($_POST['email']);
    $password= stripcslashes($_POST['password']);
    if(isset($_POST['birthday_month']) && isset($_POST['birthday_day']) && isset($_POST['birthday_year'])){
       
        $birthday_month=(int)$_POST['birthday_month'];
        $birthday_day=(int)$_POST['birthday_day'];
        $birthday_year=(int)$_POST['birthday_year'];
        $birthday= htmlentities(mysqli_real_escape_string($conn,$birthday_day.'-'. $birthday_year.'-'.$birthday_month));
    }
    $username= htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $email=  htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password= htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $md5_pass= md5($password);

    if(isset($_POST['gender'])){
    $gender= htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
    if(!in_array ($gender,['male', 'female'])){
    $gender_error='please choose gender<br>';
    $err_s= 1;


       }
    } 
                                                                    //My sql Control ediyor
    $check_user= "SELECT * FROM `users` WHERE username= '$username'";
    $check_result= mysqli_query($conn,$check_user);
    $num_rows=mysqli_num_rows($check_result);
    if($num_rows !=0){
        $user_error='<p id="error">the username has exit before<p> ';
        $err_s=1; 
    }
 
// if it is empty 

if(empty($username)){
    $user_error='<p id="error">Please enter username<p> ';
    $err_s=1;
} elseif(strlen($username) < 6){
    $user_error='Your username needs to have a minmum of 6 letter';
    $err_s= 1;
} elseif(filter_var($username, FILTER_VALIDATE_INT)){
    $user_error='please enter a valid not a number';
    $err_s= 1;
}

if(empty($email)){
    $email_error='<p id="error">Please enter email<p> ';
    $err_s=1;
}
elseif(filter_var($email, FILTER_VALIDATE_INT)){
    $email_error='Please inter validate Email';
    $err_s= 1;
}


if(empty($gender)){
    $gender_error='<p id="error">Please enter gender<p>';
    $err_s=1;
} 

if(empty($birthday)){
    $birthday_error='<p id="error">Please enter birthday<p>';
    $err_s=1;
}

if(empty($password)){
    $pass_error='<p id="error">Please enter password<p> ';   // password
    $err_s=1;
     include('register.php');
}
elseif(strlen($password) < 6){
    $pass_error='<p id="error">Please enter password<p> ';   // password
    $err_s= 1;
    include('register.php');
} 

   if(($err_s==0) &&($num_rows==0)){

        if($gender =='male'){
            $picture='erkek.png';
        }

        elseif($gender =='female'){
            $picture='kadin1.jpg';
        }

        $sql="INSERT INTO users(username, email,password,  birthday ,gender, md5_pass, profile_picture) 
        VALUES('$username' , '$email', '$password', '$birthday', '$gender', '$md5_pass' ,'$picture')";
        mysqli_query($conn,$sql);
        header('location:index.php');
   
   } 
    
    else  
    {
         include('register.php');
    }
   
}


?>