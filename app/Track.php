<?php 

namespace App;

class Track extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function tampil()
	{
		$sql = "SELECT tr.*, al.album_name as ALB, ar.artist_name as ART
		FROM tb_track tr 
		INNER JOIN tb_album al ON tr.track_id_album=al.album_id
		LEFT JOIN tb_artist ar ON al.album_id_artist=ar.artist_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}


	public function input() {

		$track_name = $_POST['track_name'];
		$track_id_album = $_POST['track_id_album'];
		$track_time = $_POST['track_time'];

		if(isset($_FILES['track_file']) && $_FILES['track_file']['error'] === UPLOAD_ERR_OK) {

			// Upload file, sederhana dan tidak ada filter serta keamanan
			$file_name = $_FILES['track_file']['name'];
			$file_tmp = $_FILES['track_file']['tmp_name'];
			$file_ext = strtolower(end(explode('.',$_FILES['track_file']['name'])));
			//$file_size = $_FILES['track_file']['size'];
			//$file_type = $_FILES['track_file']['type'];			

			$file_name_new = md5(time() . $file_name) . '.' . $file_ext;

			$file_dir = "./layout/assets/uploads/";

			if(move_uploaded_file($file_tmp, $file_dir . $file_name_new)) {
				$sql = "INSERT INTO tb_track (track_name, track_id_album, track_time, track_file) VALUES (:track_name, :track_id_album, :track_time, :track_file)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(":track_name", $track_name);
				$stmt->bindParam(":track_id_album", $track_id_album);
				$stmt->bindParam(":track_time", $track_time);
				$stmt->bindParam(":track_file", $file_name_new);
				$stmt->execute();
			} 

		} else {

			$sql = "INSERT INTO tb_track (track_name, track_id_album, track_time) VALUES (:track_name, :track_id_album, :track_time)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":track_name", $track_name);
			$stmt->bindParam(":track_id_album", $track_id_album);
			$stmt->bindParam(":track_time", $track_time);
			$stmt->execute();
		}

		return false;
	}

	public function listAlbum()
	{
		$sql = "SELECT * FROM tb_album";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}

	
	public function edit($id)
	{
		$sql = "SELECT * FROM tb_track WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{

		$track_name = $_POST['track_name'];
		$track_id_album = $_POST['track_id_album'];
		$track_time = $_POST['track_time'];
		$id = $_POST['track_id'];

		if(isset($_FILES['track_file']) && $_FILES['track_file']['error'] === UPLOAD_ERR_OK) {

			// Upload file, sederhana dan tidak ada filter serta keamanan
			$file_name = $_FILES['track_file']['name'];
			$file_tmp = $_FILES['track_file']['tmp_name'];
			$file_ext = strtolower(end(explode('.',$_FILES['track_file']['name'])));
			//$file_size = $_FILES['track_file']['size'];
			//$file_type = $_FILES['track_file']['type'];			

			$file_name_new = md5(time() . $file_name) . '.' . $file_ext;

			$file_dir = "./layout/assets/uploads/";

			if(move_uploaded_file($file_tmp, $file_dir . $file_name_new)) {

				$sql = "UPDATE tb_track SET 
				track_name=:track_name, 
				track_id_album=:track_id_album,
				track_time=:track_time,
				track_file=:track_file
				WHERE track_id=:track_id";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(":track_name", $track_name);
				$stmt->bindParam(":track_id_album", $track_id_album);
				$stmt->bindParam(":track_time", $track_time);
				$stmt->bindParam(":track_file", $file_name_new);
				$stmt->bindParam(":track_id", $id);
				$stmt->execute();

			} 

		} else {
			$sql = "UPDATE tb_track SET 
			track_name=:track_name, 
			track_id_album=:track_id_album,
			track_time=:track_time
			WHERE track_id=:track_id";
			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(":track_name", $track_name);
			$stmt->bindParam(":track_id_album", $track_id_album);
			$stmt->bindParam(":track_time", $track_time);
			$stmt->bindParam(":track_id", $id);
			$stmt->execute();
		}

		return false;
	}


	public function delete($id)
	{
		$sql = "DELETE FROM tb_track WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();
		return false;
	}


}