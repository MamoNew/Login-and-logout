<?php
session_start();
include('inc/connections.php');
//ssession_unset();
session_destroy();
header('location:index.php');


?>