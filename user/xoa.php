<?php
$id = $_GET['id'];
include_once __DIR__ . '/../dao/UserDAO.php';
$dao = new UserDAO();
$dao->remove($id);
header("location:danhsach.php");
exit(301);