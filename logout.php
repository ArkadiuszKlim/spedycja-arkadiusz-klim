<?php
    require_once('session-control.php');
    session_destroy();
    header("Location: index.php");
?>