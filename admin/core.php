<?php
ob_start();


  

  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$current_file = $_SERVER['SCRIPT_NAME'];



?>