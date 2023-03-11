<?php

require_once('Database.php');

class EmployeeModel extends Database {

public function __construct() {
	parent::__construct();
	$this->table = 'tbl_employees';
	$this->fields = "lname,fname,username,password,job,image,thumb,role";
}

public function newEmployee($formvalues) {
	$statement = "(" . $this->fields . ") VALUES (?,?,?,?,?)";
	$this->create($statement,$formvalues);
}

public function updateEmployee($formvalues) {
	$statement = " SET lname=?,fname=?,username=?,password=?,job=?,image=?,thumb=?,role=? WHERE id=?";
	$this->update($statement,$formvalues);
}

public function deleteEmployee($id) {
	//code to be sure the deletion should happen
	$this->delete($id);
}


}
?>