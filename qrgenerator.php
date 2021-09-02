<?php
    // generador de qr
    include('phpqrcode/qrlib.php');
        
    $param = $_GET['id']; // remember to sanitize that - it is user input!
    
    QRcode::png($param);
?>