<?php

include "./service/GistService.php";

try {
    $gist_id = $_POST["gist_id"];
    $gist_service->delete($gist_id);
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