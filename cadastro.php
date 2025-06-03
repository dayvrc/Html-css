<!DOCTYPE html> <!--Tag que mostra que o documento e tipo html-->
<html lang="pt-br"> <!--Tag que inicia o html e lang define idioma-->

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

<body>

    <!-- Incluindo a navbar -->
    <?php include('navbarLogin.php'); ?>

    <section class="section_cadastro">

        <div style="padding: 2%;">
            <h2>Cadastro</h2>
        </div>

        <form id="cadastroForm" method="post" name="formulario" class="form_cadastro">
            <!-- Nome -->
            <label for="nome">Nome Completo*</label>
            <input type="text" id="nome" name="nome" required>

            <!-- CPF -->
            <label for="cpf">CPF*</label>
            <input type="text" id="cpf" name="cpf" required>

            <!-- Email -->
            <label for="email">E-mail*</label>
            <input type="email" id="email" name="email" required>

            <!-- Telefone -->
            <label for="telefone">Telefone*</label>
            <input type="tel" id="telefone" name="telefone" required>

            <!-- Gênero -->
            <label>Gênero</label>
            <select name="genero" id="genero">
                <option value="">Selecione</option> <!-- value vazio -->
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Não binário">Não binário</option>
                <option value="Prefiro não informar">Prefiro não informar</option>
            </select>

            <!-- Senha -->
            <label for="senha">Senha*</label>
            <input type="password" id="senha" name="senha" required>

            <!-- Botão -->
            <button type="submit" class="botao-compra">Enviar</button>
        </form>

        <div id="popupMensagem" class="popup">
            <p id="mensagemPopup"></p>
        </div>

    </section>

    <!-- Incluindo o footer -->
    <?php include('footer.php'); ?>

    <script src="Jquery\jquery-3.7.1.js"></script>
    <script src="JavaScript\global.js"></script>

</body>

</html>