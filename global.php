<?php

$page   = isset($_GET['page'])   ? $_GET['page']   : false;
$action = isset($_GET['action']) ? $_GET['action'] : false;

$sql = new mysqli("localhost","root","namasu69","nades");

session_start();
?>