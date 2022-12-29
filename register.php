<?php

require_once("../src/config/config.php");

$name = $_POST["cadastro-nome"];
$email = $_POST["cadastro-email"];
$password = $_POST["cadastro-password"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error-register"] = "E-mail inválido.";
    header("Location: ../index.php#form-register");
    exit;
}

if (strlen($password) < 8) {
    $_SESSION["error-register"] = "A senha deve ter no mínimo 8 caracteres.";
    header("Location: ../index.php#form-register");
    exit;
}

$database = new Database();
$connection = $database->getConnection();

$query = "SELECT * FROM users WHERE email = :email";
$statement = $connection->prepare($query);
$statement->bindParam(":email", $email);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION["error-register"] = "E-mail já cadastrado.";
    unset($_SESSION["success-register"]);
    header("Location: ../index.php#form-register");
    exit;
}

$query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
$statement = $connection->prepare($query);
$statement->bindParam(":name", $name);
$statement->bindParam(":email", $email);
$statement->bindParam(":password", password_hash($password, PASSWORD_DEFAULT));
$statement->execute();

$_SESSION["success-register"] = "Cadastro realizado com sucesso. Faça login para continuar.";
unset($_SESSION["error-register"]);
header("Location: ../index.php#form-register");