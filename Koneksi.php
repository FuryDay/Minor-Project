<?php
$server =  "localhost";
$username = "root";
$password = "";
$database = "apotik";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Connection failed");
mysql_select_db($database) or die("Database cannot be open");



?>
