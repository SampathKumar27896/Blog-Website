<?php

    include('includes/constant.php');
    if(!isset($_SESSION['user_name'])){
        session_start();
    }
    else{
        header("Location:".$base_url."login.php");
    }



?>