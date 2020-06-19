<h2>DATA ARTIS
	<h3><a href="dashboard.php?page=artist_input" class="btn">Add</a></h3>
</h2>

<?php 

$art = new App\Artist();
$rows = $art->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	<?php foreach ($rows as $row) { ?>
		<tr>
			<td><?php echo $row['artist_id']; ?></td>
			<td><?php echo $row['artist_name']; ?></td>
			<td><a href="dashboard.php?page=artist_edit&id=<?php echo $row['artist_id']; ?>" class="btn">Edit</a></td>
			<td><a href="dashboard.php?page=artist_proses&delete-id=<?php echo $row['artist_id']; ?>" class="btn">Delete</a></td>
		</tr>
	<?php } ?>
</table>