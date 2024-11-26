<?php 
$aid=addslashes($_GET['aid']);
session_start();
if(isset($_SESSION['logindboy'])){
    session_destroy();
    header("Location:index.php?aid=$aid");
}

?>