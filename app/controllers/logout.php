<?php


session_start();

if(!isset($_SESSION["logged_in_user"])) {
	header("Location: ../views/login.php");
}

session_destroy();

header("Location: ../views/login.php");