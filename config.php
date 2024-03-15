<?php 

$mysql = new mysqli("localhost","root","","agenda");

if( $mysql == FALSE ) {
    echo "Erro na conexão";
}