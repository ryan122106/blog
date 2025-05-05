<?php


 //remove the user session

 unset($_SESSION["user"]);

 header("Location: /");
 exit;