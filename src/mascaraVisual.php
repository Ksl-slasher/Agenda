<?php

class MascaraVisual
{
    private $var;
    public function __construct()
    {
    }
    function mask($mask, $str)
    {
        return vsprintf($mask, str_split($str));
    }
}