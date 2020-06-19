<?php

// Config
require_once "inc/config.php";

$user = new App\User();

if ($_POST['btn-simpan']) {
	$user->input();
	header("location:dashboard.php?page=user_tampil");
}

if ($_POST['btn-update']) {
	$user->update();
	header("location:dashboard.php?page=user_tampil");
}


if ($_GET['delete-id']) {
	$art->delete($_GET['delete-id']);
	header("location:dashboard.php?page=user_tampil");	
}

?>