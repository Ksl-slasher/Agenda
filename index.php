<?php

require 'config.php';
require 'src/Agenda.php';
require 'src/redireciona.php';
$id = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    $id = -1;
}


$listaContatos = new Agenda($mysql);
$contatos = $listaContatos->exibirTodos();
$contato = $listaContatos->encontrarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' and $id === -1 ) {

    $contato = new Agenda($mysql);
    $contato->adicionarContato($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], $_POST['email'], $_POST['telefone']);

    redireciona('index.php');

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' and $id != -1 ) {

    $contato = new Agenda($mysql);
    $contato->editarContato($_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['estado'], $_POST['email'], $_POST['telefone'], $_POST['id']);

    redireciona('index.php');

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>

    <script src="src/mascara.js"></script>
    <link rel="stylesheet" href="reset/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">



</head>

<body>
    <section class="section">
        <header class="formulario-entrada">
            <h1>Agenda</h1>
                
                    <form action="<?php if($id != -1){echo "index.php?id=". $contato['con_id'];} else{echo "index.php";}?>" method="POST">
                        <label for="Nome">Nome</label>
                        <input name="nome" type="text" placeholder="John Doe" id='nome' value="<?php if($id != -1){echo $contato['con_nome'];}?>" required>

                        <label for="Endereço">Endereço</label>
                        <input name="endereco" type="text" placeholder="Rua Capital, 33" value="<?php if($id != -1){echo $contato['con_endereco'];}?>" id="endereco" required>

                        <label for="Cidade">Cidade</label>
                        <input name="cidade" type="text" placeholder="São Bento do Sul" value="<?php if($id != -1){echo $contato['con_cidade'];}?>" id="cidade" required>

                        <label for="Estado">Estado</label>
                        <input name="estado" type="text" placeholder="Santa Catarina" value="<?php if($id != -1){echo $contato['con_estado'];}?>" id="estado" required>

                        <label for="Email">Email</label>
                        <input name="email" type="email" placeholder="JohnDoe@exemplo.com" value="<?php if($id != -1){echo $contato['con_email'];}?>" id="email" required>

                        <label for="Telefone">Telefone</label>
                        <input name="telefone" type="tel" placeholder="(XX)XXXXX-XXXX" onkeyup="handlePhone(event)" value="<?php if($id != -1){echo $contato['con_telefone'];}?>" id="telefone" required>

                        <input type="hidden" name="id" value="<?php if($id != -1){echo $contato['con_id'];} ?>" > 

                        <input id="salvar" type="submit" value="Salvar">
            


            </form>

        </header>
    </section>
    <section class="section" id="listaContatos">
        <h1>Contatos</h1>
        <div>
            <table>
                <tr>
                    <th>
                        <h2>Nome</h2>
                    </th>
                    <th>
                        <h2>Endereço</h2>
                    </th>
                    <th>
                        <h2>Cidade</h2>
                    </th>
                    <th>
                        <h2>Estado</h2>
                    </th>
                    <th>
                        <h2>Email</h2>
                    </th>
                    <th>
                        <h2>Telefone</h2>
                    </th>
                    <th>
                        <h2>Ações</h2>
                    </th>

                </tr>
                <?php $index = 0; foreach ($contatos as $contato): ?>
                    
                    <tr <?php if($index%2==0){ echo 'class="cinza"';} else { echo 'class= "branco"'; } $index++; ?> >
                        <td>
                            <?php echo $contato['con_nome'] ?>
                        </td>
                        <td>
                            <?php echo $contato['con_endereco'] ?>
                        </td>
                        <td>
                            <?php echo $contato['con_cidade'] ?>
                        </td>
                        <td>
                            <?php echo $contato['con_estado'] ?>
                        </td>
                        <td>
                            <?php echo $contato['con_email'] ?>
                        </td>
                        <td>
                            <?php echo $contato['con_telefone'] ?>
                        </td>
                        <td>
                            <button><a href="index.php?id=<?php echo $contato['con_id']?>">Editar</a></button>
                            <button onclick="retornarAoLocal()" ><a href="deletar.php?id=<?php echo $contato['con_id']?>" onclick="return confirm('Tem certeza que deseja excluir o registro? ');" >Excluir</a></button>
                        </td>
                    </tr>

                <?php endforeach ?>


            </table>

        </div>
    </section>

</body>

</html>