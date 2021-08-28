<?php

require_once './lib/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./views');
$twig = new \Twig\Environment($loader, []);

$template = $twig->load('v_main.html');

$titlePage = 'Регистация';


echo $template->render([
  'titlePage' => $titlePage,
]);