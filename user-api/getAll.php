<?php

include "../service/UserService.php";

try {
    $users = $user_service->getAll();
    echo json_encode([
        "success" => true,
        "users" => $users
    ]);
} catch (Exception $exception) {
    echo json_encode([
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

?>