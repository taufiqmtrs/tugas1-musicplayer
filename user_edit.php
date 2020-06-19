<?php 

$id = $_GET['id'];

$user = new App\User();
$row = $user->edit($id);
?>

<h2>EDIT USER</h2>

<form method="POST" action="user_proses.php">
	<input type="hidden" name="user_id" value="<?php echo $id; ?>">
	<table>
		<tr>
			<td>USERNAME</td>
			<td><input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" required=""></td>
		</tr>
		<tr>
			<td>PASSWORD</td>
			<td>
				<input type="password" name="user_password">
				<div><small>Kosongkan jika tidak ingin diubah</small></div>
			</td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td><input type="text" name="user_email" value="<?php echo $row['user_email']; ?>" required=""></td>
		</tr>
		<tr>
			<td>NAMA LENGKAP</td>
			<td><input type="text" name="user_nama_lengkap" value="<?php echo $row['user_nama_lengkap']; ?>" required=""></td>
		</tr>
		<tr>
			<td>ROLE</td>
			<td>
				<select name="user_role">
					<option value="1"<?php echo $row['user_role']==1 ? " selected" : ""; ?>>Administrator</option>
					<option value="2"<?php echo $row['user_role']==2 ? " selected" : ""; ?>>Operator</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>