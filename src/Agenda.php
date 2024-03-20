<?php

class Agenda
{
    

    private $mysql;


    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    // Create
    public function adicionarContato(string $nome, string $endereco, string $cidade, string $estado, string $email, string $telefone): void
    {   
        $clean = array("-", "(", ")", " ");
        $telefone = str_replace($clean,"", $telefone);
        $adicionaContato = $this->mysql->prepare('INSERT INTO `tb_contatos` (`con_nome`, `con_endereco`, `con_cidade`, `con_estado`, `con_email`, `con_telefone` ) VALUES (?, ?, ?, ?, ?, ?) ;');
        $adicionaContato->bind_param('ssssss', $nome, $endereco, $cidade, $estado, $email, $telefone);
        $adicionaContato->execute();

    }

    // Read
    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM `tb_contatos`;');
        $contatos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $contatos;

    }

    public function encontrarPorId(string $id): array
    {
        $selecionaContato = $this->mysql->prepare('SELECT * FROM `tb_contatos` WHERE con_id = ?');
        $selecionaContato->bind_param('s', $id);
        $selecionaContato->execute();
        $contato = $selecionaContato->get_result()->fetch_assoc();
        if($contato === null){
            return $array = array();
        }else{
            return $contato;
        }

    }

    // Update
    public function editarContato(string $nome, string $endereco, string $cidade, string $estado, string $email, string $telefone, string $id): void
    {
        $clean = array("-", "(", ")", " ");
        $telefone = str_replace($clean,"", $telefone);
        $editarContato = $this->mysql->prepare('UPDATE `tb_contatos` SET con_nome = ?, con_endereco = ?, con_cidade = ?, con_estado= ?, con_email= ?, con_telefone= ? WHERE con_id = ?;' );
        $editarContato->bind_param('sssssss', $nome, $endereco, $cidade, $estado, $email, $telefone, $id);
        $editarContato->execute();

    }

    //Delete
    public function deletarContato(string $id): void
    {
        $deletaContato = $this->mysql->prepare('DELETE FROM  `tb_contatos` WHERE con_id = ?;');
        $deletaContato->bind_param('s', $id);
        $deletaContato->execute();
        
    }
}