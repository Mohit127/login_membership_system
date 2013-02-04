<?php

session_start();
define("DB_DSN","mysql:host=localhost;dbname=membership");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("CLASS_PATH", "classes");
require (CLASS_PATH."/central.php");

?>