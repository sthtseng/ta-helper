<?php 
    require("config.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        
        $result = $conn->query("SELECT * FROM ta_users_tbl
            				WHERE username='". $_REQUEST['username']."' AND isActive='y'");
        $login_ok = false; 
        $row = $result->fetch_assoc(); 
        if($row) {
            $check_password = hash('sha256', $_REQUEST['password']);
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 
 
        if($login_ok){ 
            unset($row['password']); 
            $_SESSION['user'] = $row;  
            header("Location: dashboard"); 
            die("Redirecting to: dashboard"); 
        } 
        else{ 
            // print("Login Failed."); 
            header("Location: login"); 
            $submitted_username = htmlentities($_REQUEST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?>