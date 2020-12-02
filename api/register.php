<?php

require_once "../conf.php";

$username = POST("username", true);
$email = POST("email", true);
$password = POST("password", true, false);
$confirm_password = POST("confirm_password", true, false);
$accept_tos = POST("accept_tos", true);

if ($password !== $confirm_password) {
    http_response_code(400);
    exit("ERROR: hasła do siebie nie pasują");
}

if ($accept_tos !== "true") {
    http_response_code(400);
    exit("ERROR: Nie zaakceptowano polityk");
}

if (!Auth::Register($username, $email, $password, $conn, $err_message)) {
    http_response_code(400);
    exit("ERROR: $err_message");
}

http_response_code(302);
header("Location: ../?page=login");

