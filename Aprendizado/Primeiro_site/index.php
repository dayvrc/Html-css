<!DOCTYPE html> <!--Tag que mostra que o documento e tipo html-->
<html lang="pt-br"> <!--Tag que inicia o html e lang define idioma-->

<!-- SHIFT + ALT + A - ATALHO DE COMENTARIO -->

<head> <!--Tag cabeça o que está aqui não e visto pelo user só navegador-->
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


<body> <!--Tag onde o fica o html que o usuario ver-->

    <!-- Incluindo a navbar -->
    <?php include('navbarLogin.php'); ?>

    <header class="header"> <!--HTML semântico de cabeçalho-->

        <div class="txt-banner"> <!--Poderia usar o termo headline -->
            <h2 style="letter-spacing: 15px;">você achou a melhor!</h2>
            <h2 style="font-size:80px">Aero Tour</h2>
<!--             <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, magnam rem unde laborum temporibus cum
                repellendus laudantium eius veritatis consequatur quod veniam, voluptates voluptate alias aliquam fugiat
                itaque cumque quia.</p> -->
        </div>

        <div class="img-banner">
            <img style="max-width: 99%;" src="CSS\img\travel.jpg">
        </div>

        <div class="txt-passagens">
            <h2>Para onde viajaremos hoje?</h2>
        </div>

    </header>

    <section> <!--Criando uma seção para apresentar-->

        <div id="container_passagens">

            <div class="bloco_passagem">
                <a style="color: black; text-decoration: none;" href="passagem.php">
                    <img src="CSS/img/Salvador.png" width="250">
                    <p>PASSAGEM</p>
                    <h3>Voos para Salvador</h3>
                    <hr>
                    <P style="font-size: 10px;">Ida e Volta</P>
                    <HR>
                    <p style="font-size: 23px; font-weight: bold;">R$ 2.000</p>
                    <p style="font-size: 10px;"> À VISTA</p>
                    <P>10x R$200</P>
                    <p></p>
                    <br>
                </a>
            </div>

            <div class="bloco_passagem">
                <a style="color: black;text-decoration: none;" href="passagem.php">
                    <img src="CSS/img/Salvador.png" width="250">
                    <p>PASSAGEM</p>
                    <h3>Voos para Salvador</h3>
                    <hr>
                    <P style="font-size: 10px;">Ida e Volta</P>
                    <HR>
                    <p style="font-size: 23px; font-weight: bold;">R$ 2.000</p>
                    <p style="font-size: 10px;"> À VISTA</p>
                    <P>10x R$200</P>
                    <p></p>
                    <br>
                </a>
            </div>

            <div class="bloco_passagem">
                <a style="color: black;text-decoration: none;" href="passagem.php">
                    <img src="CSS/img/Salvador.png" width="250">
                    <p>PASSAGEM</p>
                    <h3>Voos para Salvador</h3>
                    <hr>
                    <P style="font-size: 10px;">Ida e Volta</P>
                    <HR>
                    <p style="font-size: 23px; font-weight: bold;">R$ 2.000</p>
                    <p style="font-size: 10px;"> À VISTA</p>
                    <P>10x R$200</P>
                    <p></p>
                    <br>
                </a>
            </div>

            <div class="bloco_passagem">
                <a style="color: black;text-decoration: none;" href="passagem.php">
                    <img src="CSS/img/Salvador.png" width="250">
                    <p>PASSAGEM</p>
                    <h3>Voos para Salvador</h3>
                    <hr>
                    <P style="font-size: 10px;">Ida e Volta</P>
                    <HR>
                    <p style="font-size: 23px; font-weight: bold;">R$ 2.000</p>
                    <p style="font-size: 10px;"> À VISTA</p>
                    <P>10x R$200</P>
                    <p></p>
                    <br>
                </a>
            </div>



        </div>

    </section>

    <!-- Incluindo o footer -->
    <?php include('footer.php'); ?>

    <script src="Jquery/jquery-3.7.1.js"></script>
    <script src="JS/global.js"></script>

</body>

</html>