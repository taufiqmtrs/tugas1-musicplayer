<h2>DATA USER
	<h3><a href="dashboard.php?page=user_input" class="btn">Add</a></h3>
</h2>

<?php 

$usr = new App\User();
$rows = $usr->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>USERNAME</th>
		<th>EMAIL</th>
		<th>NAMA LENGKAP</th>
		<th>ROLE</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>
	<?php foreach ($rows as $row) { ?>
		<tr>
			<td><?php echo $row['user_id']; ?></td>
			<td><?php echo $row['user_name']; ?></td>
			<td><?php echo $row['user_email']; ?></td>
			<td><?php echo $row['user_nama_lengkap']; ?></td>
			<td>
				<?php 
				if($row['user_role'] == 1) {
					echo "Administrator";
				} else {
					echo "Operator";
				}
				?>				
			</td>
			<td><a href="dashboard.php?page=user_edit&id=<?php echo $row['user_id']; ?>" class="btn">Edit</a></td>
			<td><a href="dashboard.php?page=user_proses&delete-id=<?php echo $row['user_id']; ?>" >Delete</a></td>
		</tr>
	<?php } ?>
</table>