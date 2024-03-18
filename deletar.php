<?php

require 'config.php';
require 'src/Agenda.php';
require 'src/redireciona.php';

$contato = new Agenda($mysql);
$contato->deletarContato($_GET['id']);

redireciona('index.php');