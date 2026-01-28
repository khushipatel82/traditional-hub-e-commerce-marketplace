<?php
    session_start();
    unset($_SESSION['is_admin_login']);
    // session_destroy();
    echo "<script>location.href='../index.php';</script>";
?>