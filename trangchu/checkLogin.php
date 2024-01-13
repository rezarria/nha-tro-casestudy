<?php
session_start();
if (!array_key_exists("user", $_SESSION)) {
    $url = htmlspecialchars($_SERVER["REQUEST_URI"]);
    header("location:/www/tro/dangnhap.php?returnUrl=$url");
    exit(301);
}
?>