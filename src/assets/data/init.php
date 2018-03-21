<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = '';
$db_database = 'miya';
$db_port = 3306;
$db_charset = 'UTF8';
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_database, $db_port);
mysqli_query($conn, "SET NAMES $db_charset");
//解决跨域问题,允许8080端口访问
header('Access-Control-Allow-Origin:http://127.0.0.1:8080');
header('Access-Control-Allow-Credentials:true');
?>
