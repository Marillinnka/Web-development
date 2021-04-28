<?php
function getPostParameter(string $nameOfParametr): string
{
    return isset($_POST[$nameOfParametr]) ? (string) $_POST[$nameOfParametr] : null;
}

function getRequestMethod(): string
{
    return $_SERVER['REQUEST_METHOD'];
}
