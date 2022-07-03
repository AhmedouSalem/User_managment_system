<?php
require_once 'admin-db.php';
$admin = new Admin();
$row = $admin->fetchAllUsers();
echo json_encode(array('data'=>$row));