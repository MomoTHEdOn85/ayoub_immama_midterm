<?php

require_once("./includes/config.php");

class Database {  // our base model class we will extend

	protected $connection;
	protected $table;
	public $rows;
	protected $fields = array();
	

	public function __construct() {
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}
	
	public function getAll() {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table);
		$stmt->execute();
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}
	
	public function getOne($id) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE id = ?");
		$stmt->execute([$id]);
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}

	public function search($fld, $str) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE ".$fld." LIKE ?");
		$stmt->execute(["%$str%"]);
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No Results Found.');
		return $arr;
		$stmt = null;
	}

	protected function create($statement,$values) {
		$password = password_hash($data['password'], PASSWORD_DEFAULT);


		$stmt = $this->connection->prepare("INSERT INTO ".$this->table.$statement);
		$stmt->execute($values);
		$stmt = null;

		header("Content-Type: application/json");
    echo json_encode($employee);
	}

	protected function update($statement,$values) {
		$fields = [];
    $values = [];
		
		foreach ($data as $key => $value) {
			if ($key !== 'password' && $key !== 'role') {
				$fields[] = "$key = ?";
        $values[] = $value;
			}
		}
      if (isset($data['password'])) {
				$password = password_hash($data['password'], PASSWORD_DEFAULT);
        $fields[] = "password = ?";
        $values[] = $password;
			}
      if (isset($data['role'])) {
				$fields[] = "role = ?";
        $values[] = $data['role'];
      }


		$values[] = $id;
    $sql = "UPDATE tbl_employees SET " . implode(", ", $fields) . " WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($values);
	
		$stmt = $this->connection->prepare("UPDATE ".$this->table.$statement);
		$stmt->execute($values);
		$stmt = null;
	}

	protected function delete($id) {
		$stmt = $this->connection->prepare("DELETE FROM ".$this->table." WHERE id=?");
		$stmt->execute([$id]);
		$stmt = null;
	}

	protected function getRole($statement, $values) {
		$stmt = $this->connection->prepare("SELECT role FROM ".$this->table." WHERE id = ?");
		$stmt->execute(["role"]);
		$this->rows = $stmt->rowCount();
		//$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result['role'];
		if(!$result) exit('No Results Found.');
		//return $arr;
		//$stmt = null;
	}

	protected function setRole ($id, $role) {
		$stmt = $this->db->prepare("UPDATE ".$this->table." SET role = ? WHERE id = ?");
    $stmt->execute([$role, $id]);

	}




}