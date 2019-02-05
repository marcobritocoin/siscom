<?php
   // Server-side
   $can_logout = $_POST["can_logout"];

   if($can_logout)
     session_destroy();

   echo json_encode(array("can_logout" => true));
?>
