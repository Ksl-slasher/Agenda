<?php

require 'config.php';
require 'src/Agenda.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $contato = new Agenda($mysql);
    $contato->adicionarContato($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], $_POST['email'], $_POST['telefone']);


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">


</head>

<body>
    <header class="formulario-entrada">
        <h1>Agenda</h1>
        <form action="index.php" method="POST">

            <label for="Nome">Nome</label>
            <input name="nome" type="text" placeholder="John Doe" id='nome' required>

            <label for="Endereço">Endereço</label>
            <input name="endereco" type="text" placeholder="Rua Capital, 33" id="endereco" required>

            <label for="Cidade">Cidade</label>
            <input name="cidade" type="text" placeholder="São Bento do Sul" id="cidade" required>

            <label for="Estado">Estado</label>
            <input name="estado" type="text" placeholder="Santa Catarina" id="estado" required>

            <label for="Email">Email</label>
            <input name="email" type="email" placeholder="JohnDoe@exemplo.com" id="email" required>

            <label for="Telefone">Telefone</label>
            <input name="telefone" type="text" placeholder="(XX)XXXXX-XXXX" id="telefone" required>

            <input id="salvar" type="submit" value="Salvar contato">

        </form>

    </header>

</body>

</html>