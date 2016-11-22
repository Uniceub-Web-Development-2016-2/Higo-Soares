<?php 
// Inicia sessões, para assim poder destruí-las 
session_start();
session_reset(); 
session_destroy(); 

header("Location: login.php"); 
?>