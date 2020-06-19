<h2>DAFTAR ALBUM</h2>

<?php 

$ind = new App\Index();
$rows = $ind->album();

?>

<table>
	<tr>
		<th>ALBUM</th>
		<th>ARTIS</th>
		<th>MUSIC</th>
	</tr>
	<?php $no=0; foreach ($rows as $row) { $no++;?>
		<tr>
			<td><?php echo $row['ALB']; ?></td>
			<td><?php echo $row['ART']; ?></td>
			<td>
				<?php if (!empty($row['track_file'])) { ?>
					<audio controls>
						<source src="<?php echo "./layout/assets/uploads/" . $row['track_file']; ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>