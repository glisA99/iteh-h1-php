<?php

include "../service/GistService.php";

try {
    $gist_id = $_POST["gist_id"];
    $gists = $gist_service->get($gist_id);
    echo json_encode([
        "success" => true,
        "gist" => $gist
    ]);
} catch (Exception $exception) {
    echo json_encode([
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

?>