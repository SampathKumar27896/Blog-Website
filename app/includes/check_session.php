<?php
    include('includes/constant.php');
    if(!isset($_SESSION['name'])){
        header("Location:".$base_url."login.php");
    }


?>
