<?php
    if(empty($_SESSION['user'])) 
    {
        header("Location: login"); 
        die("Redirecting to Login"); 
    }
?>