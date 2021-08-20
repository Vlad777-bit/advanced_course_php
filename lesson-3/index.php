<?php

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, []);

$template = $twig->load('index.html');

$title = 'Gallery';
$h1 = 'Photo gallery';
$photo = scandir('./public/images/small');
$small = "./public/images/small" ;
$big = "./public/images/big";

$error = $_GET['err'];


echo $template->render([
  'title' => $title,
  'h1' => $h1,
  'photo' => $photo,
  'small' => $small,
  'big' => $big,
  'error' => $error,
]);