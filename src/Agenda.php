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
    

}