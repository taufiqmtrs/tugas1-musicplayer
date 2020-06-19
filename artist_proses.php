<?php 

// Config
require_once "inc/config.php";

$art = new App\Artist();

if ($_POST['btn-simpan']) {
	$art->input();
	header("location:dashboard.php?page=artist_tampil");
}

if ($_POST['btn-update']) {
	$art->update();
	header("location:dashboard.php?page=artist_tampil");
}


if ($_GET['delete-id']) {
	$art->delete($_GET['delete-id']);
	header("location:dashboard.php?page=artist_tampil");	
}

?>
