<?php
$id = $_GET['id'];
include_once __DIR__ . '/../dao/PostDAO.php';
$dao = new PostDAO();
$dao->remove($id);
header("location:danhsach.php");
exit(301);