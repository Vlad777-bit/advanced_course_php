<?php

require_once './vendor/autoload.php';
include './config/config.php';
include './engine/Products.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, []);

$template = $twig->load('index.html');

$titlePage = 'Каталог товаров';
$products = $item;

echo $template->render([
  'titlePage' => $titlePage,
  'products' => $products,
  'count' => count($item),
]);