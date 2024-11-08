<?php
$databaseName = 'SGORGEES_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'sgorgees_writer';
$password = 'MP8W@Xg9f!E@PtTf/{/3';

$pdo= new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection Complete -->';
?>

