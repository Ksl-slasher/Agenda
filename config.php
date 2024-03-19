<?php 

$mysql = new mysqli("localhost","root","","db_agenda");

if( $mysql == FALSE ) {
    echo "Erro na conexão";
}