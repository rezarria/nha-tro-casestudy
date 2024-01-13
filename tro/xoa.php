<?php
$id = $_GET['id'];
include_once __DIR__ . '/../dao/MotelDAO.php';
$dao = new MotelDAO();
$dao->remove($id);
header("location:danhsach.php");
exit(301);