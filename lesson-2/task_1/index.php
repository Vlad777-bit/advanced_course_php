<?php

spl_autoload_register(function ($className)
{
  include_once "$className.php";
});

$game = new Game('Witcher 3');
$ssd = new Ssd('WDC blue');

echo $game->count() . '<br>'; 
echo $ssd->count() . '<br>';



