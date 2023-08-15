<?php
if (isset($_GET['id'])) {
    $item = "id";
    $value = $_GET['id'];

    $user = FormController::ctrUpdateUser($item, $value);
}
?>

<div>
    <form method="post">
        <input type="text" value="<?php echo $user['name']; ?>" id="name" placeholder="Name" name="updateName">
        <input type="email" value="<?php echo $user['email']; ?>" id="email" placeholder="Email" name="updateEmail">
        <input type="password" id="password" placeholder="Password" name="updatePassword">
        <input type="hidden" value="<?php echo $user['password']; ?>" name="currentPassword">
        <input type="hidden" value="<?php echo $user['id']; ?>" name="id">
        <?php
        $updateUser = FormController::ctrUpdateUser();
        if ($updateUser == "ok") {
            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo '<div class="alert alert-success">User updated successfully</div>';
            echo '<script>
                setTimeout(function() {
                    window.location = "index.php?route=users";
                }, 3000);
            </script>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>