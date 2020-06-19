<?php 

$id = $_GET['id'];

$art = new App\Artist();
$row = $art->edit($id);
?>

<h2>EDIT ARTIS</h2>

<form method="POST" action="artist_proses.php">
	<input type="hidden" name="artist_id" value="<?php echo $id; ?>">
	<table>
		<tr>
			<td>NAMA</td>
			<td><input type="text" name="artist_name" value="<?php echo $row['artist_name']; ?>" required=""></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>