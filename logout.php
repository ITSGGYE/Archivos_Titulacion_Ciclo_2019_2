<?php 
 session_start();
 
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
     ?><script>  window.location.replace('login.php');</script><?php   
		exit;
    }
	if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
 
session_unset(); 

// destroy the session 
session_destroy(); 
?><script> 
<!--
window.location.replace('index.php'); 
//-->
</script>
			 <?php  
?>