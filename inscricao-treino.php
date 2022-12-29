<?php
require_once("src/config/config.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

$database = new Database();
$connection = $database->getConnection();

$query = "
SELECT *
FROM workouts
";
$statement = $connection->prepare($query);
$statement->execute();

$workouts = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
              crossorigin="anonymous">
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
                        <a class="nav-link text-white" href="./pagamento.php">Pagamento</a>
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

    <main>
        <h1 class="" style="color: rgb(255, 153, 0);">INSCREVA-SE NOS NOSSOS TREINOS!</h1>
        <?php if (isset($_SESSION["error-subscribe"])): ?>
            <div>
                <span class="msg-error"><?= $_SESSION["error-subscribe"] ?></span>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION["success-subscribe"])): ?>
            <div>
                <span class="msg-success"><?= $_SESSION["success-subscribe"] ?></span>
            </div>
        <?php endif; ?>
        <div class="card bg-dark">
            <?php foreach ($workouts as $workout): ?>
                <button id="<?= $workout["id"] ?>"><?= $workout["name"] ?></button>
                <div class="escondido treino" id="treino-gluteo">
                    <ul class="text-white">
                        <?= $workout["description"] ?>
                    </ul>
                    <a class="subscribe"
                       href="/workouts/subscribe-workout.php?id=<?= $workout["id"] ?>">Inscrever-se</a>
                </div>
            <?php endforeach; ?>
            <?php if (empty($workouts)): ?>
                <a href="#">
                    <button>Não possuimos nenhum treino no momento ;( <br/></button>
                </a>
            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <script>
        var botoes = []
        var count = 0
        document.querySelector('main').querySelectorAll('button').forEach(e => {
                botoes.push(
                    {
                        elemento: e,
                        treino: document.querySelectorAll(`.treino`)[count]
                    }
                )
                count++
            }
        )
        botoes.forEach(element => {
            element.elemento.addEventListener('click', () => {
                if (element.treino.classList.contains('escondido')) {
                    element.treino.classList.remove("escondido")
                } else {
                    element.treino.classList.add('escondido')
                }


            })
        });
    </script>
    </body>
    </html>

<?php
unset($_SESSION["error-subscribe"]);
unset($_SESSION["success-subscribe"]);
?>