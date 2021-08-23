<?php

require_once './vendor/autoload.php';
include './config/config.php';
include './engine/Products.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, []);

$template = $twig->load('index.html');

$title = 'Каталог товаров';
$title_product = $item['title'];
$description = $item['desc_short'];

echo $template->render([
  'title' => $title,
  'title_product' => $title_product,
  'description' => $description,
]);