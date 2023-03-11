<!--Adding form Adding users-->
<form action="index.php" method="post">

    <input type="hidden" name="task" value="create">

    <input type="hidden" name="id" value="<?php echo $user_data['user_id']; ?>">

    <label for="lname">Last Name:</label>
    <input type="text" name="lname" id="lname" value="<?php echo $user_data['user_lname']; ?>"><br>
    <label for="fname">First Name:</label>
    <input type="text" name="fname" id="fname" value="<?php echo $user_data['user_fname']; ?>"><br>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $user_data['user_username']; ?>"><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br>
    <label for="photo">Photo:</label>
    <input type="text" name="photo" id="photo" value="<?php echo $user_data['user_photo']; ?>"><br>

    <label for="role">Role:</label>
    <select name="role_id" id="role">
        <?php foreach ($roles as $role): ?>
            <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Add User">
</form>
             

 