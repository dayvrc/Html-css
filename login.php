<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> <!--Tag de tipo de caracter com acento-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Tag de combatibilidade de explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tag de compatibilidade de expansão de tela-->
    <meta name="description" content="Esse é meu primeiro site">
    <meta name="keywords" content="programacao,html,css,javascript">
    <meta name="author" content="Dayvson Costa">
    <title>Aero Tour | Viaje bem</title> <!--Tag de titulo-->
    <link rel="stylesheet" href="CSS/estilo.css"> <!--TAG PARA LINK DE CSS-->
</head>

<body class="bodyLogin" >

    <!-- Incluindo a navbar -->
    <?php include('navbarLogin.php'); ?>

    <section>

        <form id="loginForm" method="POST" action="PHP/login.php">

            <div class="login_Form">
                <div class="cadastro">
                    <h2 style="text-align: center; padding: 10%;">Login</h2>
                </div>

                <div class="iniciar_sessao">
                    <!--LEGENDA PARA EMAIL-->
                    <label for="campo_email">E-mail</label>
                    <!--ENTRADA DE DADOS TIPO EMAIL-->
                    <input id="campo_email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    <label for="campo_senha">Senha</label>
                    <input id="campo_senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="container_login_btn">
                    <!--BOTÃO-->
                    <div>
                        <br><br>
                        <a href="cadastro.php" class="btn_1">Cadastre-se</a>
                        <button class="btn_1" type="submit">Entrar</button>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </form>


    </section>

    <!-- Incluindo o footer -->
    <?php include('footer.php'); ?>

    <script src="Jquery\jquery-3.7.1.js"></script>
    <script src="JavaScript\global.js"></script>

</body>

</html>