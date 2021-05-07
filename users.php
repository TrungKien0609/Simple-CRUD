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
    $users = getUsers();
    $data['id'] = rand(10000,20000);
    $users[]= $data;
    putJSOn($users);
    return $data;
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
    putJSOn($users);
    return $updateUser;
}
function deleteUser($id)
{
    $users = getUsers();
    foreach($users as $i => $user){
        if($user['id'] == $id){
             array_splice($users,$i,1);
        }
    }
    putJSOn($users);
    // echo "<pre>";
    // var_dump($users);
    // echo "</pre>";
   
}
function uploadImage($file,&$user){
    if (isset($file)) {
        if(!is_dir(__DIR__ . "/images/")){
            mkdir(__DIR__ . "/images/");
        }
        //tìm định dạng của file ảnh : jepg,jpg,...
        $filename = $file['name'];
        // tìm vị trí của kí tự .
        $dotposition =  strpos($filename,".");
        $extension = substr($filename,$dotposition+1);
        $user['extension'] = $extension;
        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/{$user['id']}.$extension");
        // header("location: index.php");
    }
}
function putJSOn($users){
    file_put_contents("./users.json",json_encode($users,JSON_PRETTY_PRINT));
}