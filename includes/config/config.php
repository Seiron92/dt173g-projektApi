<?php
error_reporting(-1);
ini_set("display_errors" , 1);
function __autoload($class_name){
    include $class_name . ".php";
    }

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", ""); 
define("DBDATABASE", "webb3");

?>