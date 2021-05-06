<?php
require "users.php";
$users = getUsers();
include "headandfoot/head.php";
?>
<div class="container">
    <p class="container">
        <a href="create.php" class="btn btn-outline-success">Create new user</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) { ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])) {
                            echo "<img src='./images/{$user['id']}.{$user['extension']}' style ='width:100px;'>";
                        } ?>
                    </td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td> <a href="<?php echo 'http://' . $user['website'] ?>"><?php echo 'http://' . $user['website'] ?></a> </td>
                    <td><a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a></td>
                    <td><a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a></td>
                </tr>
            <?php } ?>


        </tbody>
    </table>
</div>

<?php
include "headandfoot/footer.php";
?>