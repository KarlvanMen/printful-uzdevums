<?php

function getGet($param)
{
    $res = null;
    if (isset($_GET[$param])) {
        $res = $_GET[$param];
    }
    return $res;
}

function getPost($param)
{
    $res = null;
    $payload = json_decode(file_get_contents('php://input'));
    if (array_key_exists($param, $payload)) {
        $res = $payload -> $param;
    }
    return $res;
}

?>