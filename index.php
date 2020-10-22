<?php

session_start();

require_once 'lib/database/conexao.php';
require_once 'app/core/core.php';
require_once 'app/controller/loginController.php';
require_once 'app/controller/cadastrarController.php';
require_once 'app/controller/homeController.php';
require_once 'app/controller/erroController.php';
require_once 'app/model/usuario.php';
require_once 'vendor/autoload.php';

//$template = file_get_contents('app/view/home.html');

//ob_start();
$core = new Core;
echo $core->start($_GET);
//$saida = ob_get_contents();
//ob_end_clean();

if (isset($saida) && isset($template)) {
    $templatePronto = str_replace('{{area_principal}}', $saida, $template);
    echo $templatePronto;
}
