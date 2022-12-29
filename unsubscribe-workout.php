<?php

require_once("../src/config/config.php");

$database = new Database();
$connection = $database->getConnection();

$workoutId = $_GET["id"];

$query = "SELECT * FROM workouts WHERE id = :id";
$statement = $connection->prepare($query);
$statement->bindParam(":id", $workoutId);
$statement->execute();

$workout = $statement->fetch(PDO::FETCH_ASSOC);

if (!$workout) {
    $_SESSION["error-unsubscribe"] = "Treino não encontrado.";
    unset($_SESSION["success-unsubscribe"]);
    header("Location: ../treino.php");
    exit;
}

$query = "SELECT * FROM users_workouts WHERE user = :user AND workout = :workout";
$statement = $connection->prepare($query);
$statement->bindParam(":workout", $workoutId);
$statement->bindParam(":user", $_SESSION["user"]["id"]);
$statement->execute();

$workoutRelations = $statement->fetch(PDO::FETCH_ASSOC);

if (!$workoutRelations) {
    $_SESSION["error-unsubscribe"] = "Você não está inscrito no treino '{$workout["name"]}'.";
    unset($_SESSION["success-unsubscribe"]);
    header("Location: ../treino.php");
    exit;
}

$query = "DELETE FROM users_workouts WHERE user = :user AND workout = :workout";
$statement = $connection->prepare($query);
$statement->bindParam(":user", $_SESSION["user"]["id"]);
$statement->bindParam(":workout", $workoutId);
$statement->execute();

$_SESSION["success-unsubscribe"] = "Inscrição do treino treino {$workout["name"]} cancelada com sucesso.";
unset($_SESSION["error-unsubscribe"]);
header("Location: ../treino.php");
exit;