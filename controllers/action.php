<?php

require_once('./models/EmployeeModel.php');
require_once('./models/Database.php');
require_once('./models/Role.php');

// A controller class. Handles the linkage between the specific
// URL passed by the user and DB fetch/put methods in the model class

$db = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = new User($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';

// Check if user is logged in and their role
session_start();
$is_admin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_role = $user->getRole($user_id);
    if ($user_role == 'admin') {
        $is_admin = true;
    }
}

// Handle form submissions
if ($action == 'add_user') {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $photo = $_POST['photo'];
    $user->addUser($lname, $fname, $username, $password, $photo);
    header('Location: index.php');
    exit();
}

if ($action == 'update_user') {
    $id = $_POST['id'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $photo = $_POST['photo'];
    $role = $_POST['role'];
    if ($is_admin) {
        $user->updateUser($id, $lname, $fname, $username, $password, $photo, $role);
    } else {
        $user->updateUser($id, $lname, $fname, $username, $password, $photo, $user_role);
    }
    header('Location: index.php');
    exit();
}

if ($action == 'delete_user') {
    $id = $_POST['id'];
    if ($is_admin) {
        $user->deleteUser($id);
    }
    header('Location: index.php');
    exit();
}



if ($action == 'get_users_json') {
    header('Content-Type: application/json');
    echo json_encode($user->getAllUsers());
    exit();
}

// Display appropriate view based on action
if ($action == 'add_user') {
    include('views/header.php');
    include('views/addForm.php');
    include('views/footer.php');

} else if ($action == 'update_user') {
    $id = $_GET['id'];
    $user_data = $user->getUserById($id);
    if ($is_admin || $user_data['user_id'] == $user_id) {
        include('views/header.php');
        include('views/updateForm.php');
        include('views/footer.php');
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    $users = $user->getAllUsers();
    include('views/header.php');
    include('views/emp_list.php');
    include('views/footer.php');
}
?>