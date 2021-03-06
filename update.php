<?php
require "./users.php";

if (!isset($_GET['id'])) {
    echo "not found";
    exit;
}
$userId = $_GET['id'];
$user = getUserById($userId);
if (!$user) {
    echo "not found";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUser($_POST, $userId);
    uploadImage($_FILES['picture'], $user);
    updateUser($user, $userId);
    header("location: index.php");
}
include "headandfoot/head.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update user: <?php echo $user['name'] ?></h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">UserName</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" value="<?php echo $user['website'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="picture" class="form-control-file">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php
include "headandfoot/footer.php";
?>