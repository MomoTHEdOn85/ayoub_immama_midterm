<?php

require_once('Database.php');

class Role extends Database {

public function __construct() {
	parent::__construct();
	$this->table = 'tbl_employees';
	$this->fields = "lname,fname,username,password,job,image,thumb,role";
}

public function getAllRoles() {
  $stmt = $this->pdo->prepare("SELECT * FROM tbl_roles");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getRoleId($id) {
  $stmt = $this->pdo->prepare("SELECT * FROM tbl_roles WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function addRole($name) {
  $stmt = $this->pdo->prepare("INSERT INTO tbl_roles (name) VALUES (?)");
  $stmt->execute([$name]);
  return $this->pdo->lastInsertId();
}

public function updateRole($id, $name) {
  $stmt = $this->pdo->prepare("UPDATE tbl_roles SET name = ? WHERE id = ?");
  $stmt->execute([$name, $id]);
}

public function deleteRole($id) {
  $stmt = $this->pdo->prepare("DELETE FROM tbl_roles WHERE id = ?");
  $stmt->execute([$id]);
}

}
?>