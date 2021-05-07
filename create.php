<?php
require "./users.php";
$user = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => ""
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $user = createUser($_POST);
    if ($_FILES['picture']) {
        uploadImage($_FILES['picture'], $user);
    }
    updateUser($user,$user['id']);
    // echo "<pre>";
    // var_dump($user);
    // echo "</pre>";
    header("location: index.php");
}
include "headandfoot/head.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Create new user</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="">UserName</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control">
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