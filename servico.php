<?php
require_once("src/config/config.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">UP Fitness</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item ">
                    <a class="nav-link text-white" href="./inscricao-treino.php">Treinos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="./pagamento.php">Pagamento</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="./treino.php">Seus Treinos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="./servico.php">Serviço ao
                        Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./users/logout.php">Deslogar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="meio">
    <div class="item1">
        <ul>
            <h2>Para mais informações acesse:</h2>
            <li><img src="assets/images/instagram-logo.png" alt=""> @upfitnesse_academia</li>
            <li><img src="assets/images/whatsapp-logo.png" alt=""> 75 98674-9578</li>
            <li><img src="assets/images/email-icon.png" alt=""> upfitnesseacademia@gmail.com</li>
        </ul>
    </div>
    <div class="item2">
        <h2 class="texto-item2">UP <br> FITNESS</h2>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>