<?php
    include("../includes/constant.php");
    include("../classes/common_class.php");

    $common_object = new User();
    $common_object->set_data("response",$user_object->get_details());
    $common_object->result();


?>