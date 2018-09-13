<?php
    include("../includes/constant.php");
    include("../classes/user_class.php");

    $user_object = new User();
    $user_object->login($_REQUEST);


?>