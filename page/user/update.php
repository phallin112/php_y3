<?php
if (!isset($_GET['id']) || getUsersByID($_GET['id']) === null) {
    header('Location: ./?page=user/home');
}

$manage_user = getUsersByID($_GET['id']);
$user_label_err = $username_err = '';
if (isset($_POST['user_label']) && isset($_POST['username']) && isset($_POST['passwd'])) {
    $id_user = $_GET['id'];
    $user_label = $_POST['user_label'];
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];


    if (empty($user_label)) {
        $user_label_err = 'User Label is required';
    }

    if (!empty($username) && usernameExist($username)) {
        $username_err = 'Username already exist';
    }

    if (empty($user_label_err) && empty($username_err)) {
        if (updateUser($id_user, $user_label, $username, $passwd)) {
            header('location: ./?page=user/home');
        }else {
            // Hash new password before updating
            $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);
        }
        
        // Redirect to home after update
        header('Location: ./?page=user/home');
    
    }
}
?>
<!-- <h1>Have</h1> -->

<form action="./?page=user/update&id= <?php echo $manage_user->id_user ?>" method="post" style="max-width: 500px;" class="mx-auto">
    <h1>Update User ID: <?php echo $manage_user->id_user ?></h1>
    <div class="mb-3">
        <label for="user_label" class="form-label">User Label</label>
        <input type="text" name="user_label" class="form-control <?php echo $user_label_err !== '' ? 'is-invalid' : '' ?>"
            id="user_label" value="<?php echo isset($_POST['user_label']) ? $_POST['user_label'] : $manage_user->user_label  ?>">
        <div class="invalid-feedback">
            <?php echo $user_label_err ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" placeholder="(optional) input username to update" class="form-control <?php echo $username_err !== '' ? 'is-invalid' : '' ?>"
            id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''  ?>">
        <div class="invalid-feedback">
            <?php echo $username_err ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="passwd" class="form-label">Password</label>
        <input type="password" name="passwd" placeholder="(optional) input new password to update" class="form-control" id="passwd" value="<?php echo isset($_POST['passwd']) ? $_POST['passwd'] : ''  ?>">
    </div>
    <div class="d-flex justify-content-between">
        <a href="./?page=user/home" role="button" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>