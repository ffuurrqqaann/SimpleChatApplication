<?php
session_start();

require '../db/db_crud_util.php';

$conn = getDbConnection();
echo getAllLogs($conn);