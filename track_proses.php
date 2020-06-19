<?php 

// Config
require_once "inc/config.php";

$trc = new App\Track();

if ($_POST['btn-simpan']) {
	$trc->input();
	header("location:dashboard.php?page=track_tampil");
}

if ($_POST['btn-update']) {
	$trc->update();
	header("location:dashboard.php?page=track_tampil");
}

if ($_GET['delete-id']) {
	$art->delete($_GET['delete-id']);
	header("location:dashboard.php?page=track_tampil");	
}

