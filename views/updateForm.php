
<!--Form for updating form-->
<form method="post" action="index.php">

    <input type="hidden" name="task" value="update">  

    <input type="hidden" name="id" value="<?= $emp['id'] ?>">
    
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= $emp['username'] ?>">
    
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $emp['email'] ?>">
    
    <label for="password">Password:</label>
    <input type="password" name="password">
    
    <label for="role">Role:</label>
    <select name="role">
        <option value="unregistered" <?php if ($emp['role'] == 'unregistered') { echo 'selected'; } ?>>Unregistered</option>
        <option value="guest" <?php if ($emp['role'] == 'guest') { echo 'selected'; } ?>>Guest</option>
        <option value="admin" <?php if ($emp['role'] == 'admin') { echo 'selected'; } ?>>Admin</option>
    </select>
    
    <button type="submit">Update User</button>
</form>