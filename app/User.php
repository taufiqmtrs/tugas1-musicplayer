<?php 

namespace App;

class User extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_users";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}

	public function input()
	{
		$user_name = $_POST['user_name'];
		$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
		$user_email = $_POST['user_email'];
		$user_nama_lengkap = $_POST['user_nama_lengkap'];
		$user_role = $_POST['user_role'];

		if (!empty($user_name) AND !empty($user_password)) {

			$sql = "INSERT INTO tb_users (user_name, user_password, user_email, user_nama_lengkap, user_role) 
			VALUES (:user_name, :user_password, :user_email, :user_nama_lengkap, :user_role)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":user_name", $user_name);
			$stmt->bindParam(":user_password", $user_password);
			$stmt->bindParam(":user_email", $user_email);
			$stmt->bindParam(":user_nama_lengkap", $user_nama_lengkap);
			$stmt->bindParam(":user_role", $user_role);
			$stmt->execute();
		} 

		return false;
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$user_name = $_POST['user_name'];
		$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
		$user_email = $_POST['user_email'];
		$user_nama_lengkap = $_POST['user_nama_lengkap'];
		$user_role = $_POST['user_role'];
		$id = $_POST['user_id'];

		if(!empty($_POST['user_password'])) {
			$sql = "UPDATE tb_users SET 
			user_name=:user_name, 
			user_password=:user_password, 
			user_email=:user_email, 
			user_nama_lengkap=:user_nama_lengkap, 
			user_role=:user_role
			WHERE user_id=:user_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":user_name", $user_name);
			$stmt->bindParam(":user_password", $user_password);
			$stmt->bindParam(":user_email", $user_email);
			$stmt->bindParam(":user_nama_lengkap", $user_nama_lengkap);
			$stmt->bindParam(":user_role", $user_role);
			$stmt->bindParam(":user_id", $id);
			$stmt->execute();
		} else {
			$sql = "UPDATE tb_users SET 
			user_name=:user_name, 
			user_email=:user_email, 
			user_nama_lengkap=:user_nama_lengkap, 
			user_role=:user_role
			WHERE user_id=:user_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":user_name", $user_name);
			$stmt->bindParam(":user_email", $user_email);
			$stmt->bindParam(":user_nama_lengkap", $user_nama_lengkap);
			$stmt->bindParam(":user_role", $user_role);
			$stmt->bindParam(":user_id", $id);
			$stmt->execute();
		}

		return false;
	}

	public function delete($id)
	{
		$sql = "DELETE FROM tb_users WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_id", $id);
		$stmt->execute();
		return false;
	}



}