<?php

include "../service/UserService.php";

try {
    $user_id = $_POST["id"];
    $user_service->delete($user_id);
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