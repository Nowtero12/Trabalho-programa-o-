<?php
require_once("src/config/config.php");

$registerActive = isset($_SESSION["success-register"]) || isset($_SESSION["error-register"]) ? "selecionado" : "";
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UP Fitness</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <section class="apresentacao">
        <div class="imagem">
            <img src="assets/images/maola.png" alt="">
        </div>
        <div class="texto-login">
            <h1>UP <br> FITNESS</h1>
            <p class="paragrafo">Tem sentimento melhor do que sentir a
                evolução no seu corpo depois de tanto
                esforço na musculação?
            </p>

        </div>
    </section>
    <section class="login">
        <div class="login-backround">
        </div>
        <div class="formularios">
            <div class="login-cadastro">
                <button onclick="mostrarLogin()" class="selecionado">
                    <span>
                        Login
                    </span>
                </button>
                <button onclick="mostrarCadastro()">
                    <span>
                        Cadastro
                    </span>
                </button>
            </div>
            <form id="form-login" action="users/login.php" method="POST"
                  class="formulario login <?= $registerActive == "" ? "selecionado" : "escondido" ?>">
                <br>
                <div class="email">
                    <label for="login-email">E-mail
                        <input type="email" name="login-email" class="login-email" placeholder="alanasouza@gmail.com">
                    </label>
                </div>
                <div class="senha">
                    <label for="login-password">Senha
                        <input type="password" name="login-password" class="login-password" placeholder="Senha">
                    </label>
                </div>
                <div>
                    <span class="msg-error"><?= $_SESSION["error-login"] ?></span>
                </div>
                <button type="submit"> Login
                    <svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                              fill-rule="evenodd"></path>
                    </svg>
                </button>
                <br>
            </form>
            <form id="form-register" action="users/register.php" method="POST"
                  class="formulario cadastro <?= $registerActive == "" ? "escondido" : "selecionado" ?>">
                <br>
                <div class="nome">
                    <label for="cadastro-nome">Nome
                        <input type="text" name="cadastro-nome" class="cadastro-nome" placeholder="Alana Souza">
                    </label>
                </div>
                <div class="email">
                    <label for="cadastro-email">E-mail
                        <input type="email" name="cadastro-email" class="cadastro-email"
                               placeholder="alanasouza@gmail.com">
                    </label>
                </div>
                <div class="senha">
                    <label for="cadastro-password">Senha
                        <input type="password" name="cadastro-password" class="cadastro-password" placeholder="Senha">
                    </label>
                </div>
                <?php if (isset($_SESSION["error-register"])): ?>
                    <div>
                        <span class="msg-error"><?= $_SESSION["error-register"] ?></span>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION["success-register"])): ?>
                    <div>
                        <span class="msg-success"><?= $_SESSION["success-register"] ?></span>
                    </div>
                <?php endif; ?>
                <button type="submit"> Cadastro
                    <svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                              fill-rule="evenodd"></path>
                    </svg>
                </button>
                <br>
            </form>
        </div>
        <script>
            var botoes = {
                login: document.querySelector('.login-cadastro').children[0],
                cadastro: document.querySelector('.login-cadastro').children[1]
            }
            var formularios = {
                login: document.querySelectorAll('.formulario')[0],
                cadastro: document.querySelectorAll('.formulario')[1]

            }

            function mostrarCadastro() {
                formularios.login.classList.add("escondido")
                formularios.cadastro.classList.remove("escondido")

                botoes.cadastro.classList.add("selecionado")
                botoes.login.classList.remove("selecionado")
            }

            function mostrarLogin() {
                formularios.cadastro.classList.add("escondido")
                formularios.login.classList.remove("escondido")

                botoes.login.classList.add("selecionado")
                botoes.cadastro.classList.remove("selecionado")
            }

        </script>
    </section>
    </body>
    </html>

<?php
unset($_SESSION["error-register"]);
unset($_SESSION["success-register"]);
unset($_SESSION["error-login"]);
?>