<?php
require_once "../conf.php";

$usernameOrEmail = POST("usernameOrEmail", true);
$password = POST("password", true, false);

if(!Auth::Login($usernameOrEmail, $password, $conn, $err_message)) {
    http_response_code(400);
    exit("ERROR: $err_message");
}

http_response_code(302);
header("Location: /");
