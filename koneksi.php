<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_electi_store';

$koneksi = mysqli_connect($host, $username, $password, $db);
