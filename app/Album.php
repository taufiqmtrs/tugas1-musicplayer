<?php 

namespace App;

class Album extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function tampil()
	{
		$sql = "SELECT tb_album.*, tb_artist.artist_name as ART 
		FROM tb_album, tb_artist
		WHERE tb_album.album_id_artist=tb_artist.artist_id ORDER BY tb_album.album_name";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}


	public function input() {

		$album_name = $_POST['album_name'];
		$album_id_artist = $_POST['album_id_artist'];

		$sql = "INSERT INTO tb_album (album_name, album_id_artist) VALUES (:album_name, :album_id_artist)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":album_name", $album_name);
		$stmt->bindParam(":album_id_artist", $album_id_artist);
		$stmt->execute();

		return false;
	}

	public function listArtist()
	{
		$sql = "SELECT * FROM tb_artist";
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
		$sql = "SELECT * FROM tb_album WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{

		$album_name = $_POST['album_name'];
		$album_id_artist = $_POST['album_id_artist'];
		$id = $_POST['album_id'];

		$sql = "UPDATE tb_album SET album_name=:album_name, album_id_artist=:album_id_artist WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":album_name", $album_name);
		$stmt->bindParam(":album_id_artist", $album_id_artist);
		$stmt->bindParam(":album_id", $id);

		$stmt->execute();

		return false;
	}

	public function delete($id)
	{
		$sql = "DELETE FROM tb_album WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();
		return false;
	}


}