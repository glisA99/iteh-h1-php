<?php

include "./service/GistService.php";

try {
    $filename = $_POST["filename"];
    $url = $_POST["url"];
    $author_id = $_POST["author_id"];
    $gist_service->create($url,$filename,$author_id);
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