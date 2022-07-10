<?php

include "../service/GistService.php";

try {
    $gists = $gist_service->getAll();
    echo json_encode([
        "success" => true,
        "gists" => $gists
    ]);
} catch (Exception $exception) {
    echo json_encode([
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

?>