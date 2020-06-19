<?php 

$id = $_GET['id'];

$alb = new App\Track();
$row = $alb->edit($id);
$lst = $alb->listAlbum();
?>

<h2>EDIT LAGU</h2>

<form method="POST" action="track_proses.php" enctype="multipart/form-data">
	<input type="hidden" name="track_id" value="<?php echo $id; ?>">
	<table>
		<tr>
			<td>JUDUL</td>
			<td><input type="text" name="track_name" value="<?php echo $row['track_name']; ?>" required=""></td>
		</tr>
		<tr>
			<td>ALBUM</td>
			<td>
				<select name="track_id_album">
					<?php foreach ($lst as $ls) { ?>
						<option value="<?php echo $ls['album_id']; ?>"<?php echo $row['track_id_album']==$ls['album_id'] ? " selected" : ""; ?>><?php echo $ls['album_name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>DURASI</td>
			<td><input type="text" name="track_time" value="<?php echo $row['track_time']; ?>" required=""></td>
		</tr>
		<tr>
			<td>FILE (MP3)</td>
			<td><input type="file" name="track_file"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>