<?php
require_once('./models/EmployeeModel.php');

// A controller class. Handles the linkage between the specific
// URL passed by the user and DB fetch/put methods in the model class

$user = new EmployeeModel();

class Employee {

private $model;

public function __construct() {
	$this->model = new EmployeeModel();
}

// This file combines specific URL 'routes' with model methods
// we dont have actual routing, but each URL with parameters
// acts as a unique 'pointer' to a resource
// e.g., localhost:8888/pdo_employees/ is unique compared to
// localhost:8888/pdo_employees/index.php?task=delete&id=1

public function loadViews() {
	//get content through the model
	//load views that match the content
	require_once('views/head.php');
	require_once('views/nav.php');
	require_once('views/emp_search.php');
	 


	
	// what content should be passed back based on URL parameters?


	//route: localhost:8888/employees/index.php?id=1

	if(isset($_GET['id']) && !isset($_GET['task'])) {
		//run query method A on the model
		//load view(s) to match the model data
		$employees = $this->model->getOne($_GET['id']);
		require_once('views/emp_detail.php');


	//route: localhost:8888/employees/index.php?str=john

	}else if(isset($_GET['str'])) {
		//run query method B on the model
		//load view(s) to match THAT model data
		$employees = $this->model->search('emp_lname',$_GET['str']);
		$rows = $this->model->rows;
		require_once('views/emp_list.php');


//route: localhost:8888/employees/index.php?task=create
//		 localhost:8888/employees/index.php?task=update
//		 localhost:8888/employees/index.php?task=delete

	}else if(isset($_GET['task'])) {
		//Create
		if($_GET['task'] == 'create') {
			//values are hard coded here----> instead you do this $_POST['lastname'] and furthermore reference the post method for the form values.
				$values = ['Bertinelli','Valerie','CFO','person3.jpg','person3th.jpg'];
			//POST values from a form
			$formvalues = ['Bertinelli','Valerie','CFO','person3.jpg','person3th.jpg'];
			$employees = $this->model->newEmployee($formvalues);
			header("location:index.php");

    //Delete
		}else if($_GET['task'] == 'delete') {
			$employees = $this->model->deleteEmployee($_GET['id']);
			header("location:index.php");

    //Update
		}else if($_GET['task'] == 'update') {
			include('views/header.php');
			include('views/addForm.php');
			include('views/footer.php');

			$id = $_POST['id'];
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$photo = $_POST['photo'];
			if ($is_admin) {
				$role = $_POST['role'];
				$employees->updateEmployee($id, $lname, $fname, $username, $password, $photo, $role);
				 
			} else {
				$user_role = $employees->getRole($id);
        $employees->updateEmployee($id, $lname, $fname, $username, $password, $photo, $user_role);
			}
			header('Location: index.php');
			header('Location: addForm.php');
			 
			exit(); 
			//POST values from a form, could also be hidden field for id value for the $_GET['id']
			///check what the GET and POST do???????????????????????????????
	    //$formvalues = ['Van Halen','Valerie','CFO','person3.jpg','person3th.jpg',$_GET['id']];
			//$employees = $this->model->updateEmployee($formvalues);
			//header("location:index.php");
		}

		
// default route:localhost:8888/employees

	}else{ 
		$employees = $this->model->getAll();
		$rows = $this->model->rows;
		require_once('views/emp_list.php');
	}

	require_once('views/footer.php');

}

}

//sha for encrypting the password
?>