<?php   
session_start(); //to ensure you are using same session session_start()
$_SESSION=array();//session array
session_destroy(); //destroy the session of system
header("location:index.php"); //to redirect back to "index.php" after logging out
exit();//exit the session

?>
