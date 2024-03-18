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
        $adicionaContato = $this->mysql->prepare('INSERT INTO `contatos` (`nome`, `endereco`, `cidade`, `estado`, `email`, `telefone` ) VALUES (?, ?, ?, ?, ?, ?) ;');
        $adicionaContato->bind_param('ssssss', $nome, $endereco, $cidade, $estado, $email, $telefone);
        $adicionaContato->execute();

    }

    // Read
    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM `contatos`;');
        $contatos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $contatos;

    }

    public function encontrarPorId(string $id): array
    {
        $selecionaContato = $this->mysql->prepare('SELECT * FROM `contatos` WHERE id = ?');
        $selecionaContato->bind_param('s', $id);
        $selecionaContato->execute();
        $contato = $selecionaContato->get_result()->fetch_assoc();
        return $contato;

    }

    // Update
    public function editarContato(string $nome, string $endereco, string $cidade, string $estado, string $email, string $telefone, string $id): void
    {
        $editarContato = $this->mysql->prepare('UPDATE `contatos` SET nome = ?, endereco = ?, cidade = ?, estado= ?, email= ?, telefone= ? WHERE id = ?;' );
        $editarContato->bind_param('sssssss', $nome, $endereco, $cidade, $estado, $email, $telefone, $id);
        $editarContato->execute();

    }

    //Delete
    public function deletarContato(string $id): void
    {
        $deletaContato = $this->mysql->prepare('DELETE FROM  `contatos` WHERE id = ?;');
        $deletaContato->bind_param('s', $id);
        $deletaContato->execute();
        
    }
}