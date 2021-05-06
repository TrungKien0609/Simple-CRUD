<?php
function getUsers()
{
    return json_decode(file_get_contents("./users.json"), true);
}
function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}
function createUser($data)
{
}
function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] ==  $id) {
            $users[$i] = $updateUser = array_merge($user, $data); // hợp 2 mảng, nếu có key trùng nhau sẽ chọn giá trị mới nhất (ở tham số thứ 2)
            // xem thêm array_merge trên W3
            // tại sao lại  không dùng $user thay cho $users[$i] . dùng $user thì không update được dữ liệu trong file JSON
        }
    }
    file_put_contents("./users.json", json_encode($users,JSON_PRETTY_PRINT));
    return $updateUser;
}
function deleteUser($id)
{
}
