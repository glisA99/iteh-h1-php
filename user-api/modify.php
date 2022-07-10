<?php

include "../service/UserService.php";

try {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $users = $user_service->modify($user_id,$name,$surname,$username);
    echo json_encode([
        "success" => true
    ]);
} catch (Exception $exception) {
    echo json_encode([
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

?>