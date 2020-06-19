<?php 

$ind = new App\Index();
$rows = $ind->track();

?>

<h2>Selamat Datang</h2>



<div class="grid-music">
	<?php foreach ($rows as $row) { ?>
		<?php if (!empty($row['track_file'])) { ?>

			<table>
				<td>
			<div>
				<p><b><?php echo $row['track_name']; ?></b></p>
				<p><?php echo $row['ALB'] . " - " . $row['ART']; ?></p>
				<p>

					<audio controls>
						<source src="<?php echo "./layout/assets/uploads/" . $row['track_file']; ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					

					</p>
				</div>
				</td>
				</table>

			<?php } ?>
		<?php } ?>

	</div>
