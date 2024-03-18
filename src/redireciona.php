<?php

function redireciona(string $url)
{
    //redirecionar
    header("Location: $url");
    die();
}