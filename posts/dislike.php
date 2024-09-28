<?php

require_once __DIR__ . '/../lib/autoload.php';


$fetchData = json_decode(file_get_contents('php://input'), true) ?? null;


if ($fetchData && $fetchData["action"] == "like") {
    if ($user->un_like($fetchData["post_id"]))
        echo json_encode(["success" => true]);
}

if ($fetchData && $fetchData["action"] == "unlike") {
    $like = $user->isUnliked($fetchData["post_id"]);
    if ($user->detach_un_like($like))
        echo json_encode(["success" => true]);
}
