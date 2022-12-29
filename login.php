<?php

require_once("../src/config/config.php");

$email = $_POST["login-email"];
$password = $_POST["login-password"];

$database = new Database();
$connection = $database->getConnection();

$query = "SELECT * FROM users WHERE email = :email";
$statement = $connection->prepare($query);
$statement->bindParam(":email", $email);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user["password"])) {
    $_SESSION["error-login"] = "Usuário e/ou senha inválido(s).";
    header("Location: ../index.php#form-login");
    exit;
}

$_SESSION["user"] = [
    "id"    => $user["id"],
    "name"  => $user["name"],
    "email" => $user["email"],
];

unset($_SESSION["error-login"]);
unset($_SESSION["error-register"]);
header("Location: ../treino.php");
exit;