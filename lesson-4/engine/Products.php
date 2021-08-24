<?php

try
{
  $connect = DB . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
  $db = new PDO( $connect, DB_USER, DB_PASS );

  if ( $db->errorInfo() === 0000 ) {
    $error_array = $db->errorInfo();
    echo "SQL ошибка: " . $error_array[2] . '<br>';
  }

  $dataInfo = $db->query("
  select title, img, desc_short from products
  join images
  where products.id = images.product_id
  ")->fetchAll(PDO::FETCH_ASSOC);

  if ( $db->errorInfo() === 0000 ) {
    $error_array = $db->errorInfo();
    echo "SQL ошибка: " . $error_array[2] . '<br>';
  }

  while ($item = $dataInfo) {
    return $item;
  }
} 
catch (PDOException $e)
{
  die( "ERROR: " . $e->getMessage() );
} 