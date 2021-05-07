<?php
require_once "./users.php";

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
include "headandfoot/head.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View user: <?php echo $user['name'] ?></h3>
        </div>
        <div class="card-body">
        <a class="btn btn-secondary" href="update.php?id=<?php echo $userId ?>">Update</a>
        <a class="btn btn-danger" href="delete.php?id=<?php echo $userId ?>">Delete</a>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><a href="<?php echo 'http://'.$user['website'] ?>"> <?php echo 'http://'.$user['website'] ?></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php
include "headandfoot/footer.php";
?>