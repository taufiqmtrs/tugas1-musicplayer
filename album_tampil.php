<h2>DATA ALBUM
	<h3><a href="dashboard.php?page=album_input" class="btn">Add</a></h3>
</h2>

<?php 

$alb = new App\Album();
$rows = $alb->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>ARTIS</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	<?php $no=0; foreach ($rows as $row) { $no++;?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['album_name']; ?></td>
			<td><?php echo $row['ART']; ?></td>
			<td><a href="dashboard.php?page=album_edit&id=<?php echo $row['album_id']; ?>" class="btn">Edit</a></td>
			<td><a href="dashboard.php?page=album_proses&delete-id=<?php echo $row['album_id']; ?>" class="btn">Delete</a></td>

		</tr>
	<?php } ?>
</table>