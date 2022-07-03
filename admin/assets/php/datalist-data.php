<?php
require_once 'admin-db.php';
$admin = new Admin();
$row = $admin->fetchAllCustomers();
echo json_encode(array('data'=>$row));