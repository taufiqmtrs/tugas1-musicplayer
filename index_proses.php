<?php

// Config
require_once "inc/config.php";

$ind = new App\Index();

if (isset($_POST['btn-login'])) {

	$ind->login();
	header("location:index.php?page=index_login");
}
