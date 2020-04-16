<?php
    session_start();
    session_unset();
    unset($_SESSION["{J3^W!>Mx48><}"] );
    session_destroy();
    header("Location: ../Index.php"); 
?>