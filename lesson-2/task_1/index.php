<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});

$game = new Game('Witcher 3');
$ssd = new Ssd('WDC blue');
$mars = new Sweetness('Mars', 321, 2.34);

echo $game->countInOne() . '<br>'; 
echo $game->count() . '<br>' . '<hr>'; 

echo $ssd->countInOne() . '<br>';
echo $ssd->count() . '<br>' . '<hr>';

echo $mars->countInOne() . '<br>';
echo $mars->count() . '<br>' . '<hr>';



