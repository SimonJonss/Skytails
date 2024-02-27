<?php 
    session_start();

    if ( empty( $_SESSION['accountID'] ) ) {
        $_SESSION['accountID'] = -1;
    }
?>