<?php 

$host ='localhost';
$dbname = 'userdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
    // echo 'Connected to database';
} catch (\Throwable $th) {
    echo 'Connection failed: '.$th->getMessage();
}




?>