<?php

define("HOST", "localhost");
define("DB", "swapi");
define("USER", "root");
define("PASS", "admin");

# verifica se está em ambiente de desenvolvimento para exibir os erros, caso contrario não exibe os erros
define("ENVIRONMENT", "dev");
if (ENVIRONMENT === 'dev')
{
    $slimSettings['displayErrorDetails'] = true;
}

$slimConfig = array('settings' => $slimSettings);
