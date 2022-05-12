<?php

try
{
  $connect = DB . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
  $db = new PDO( $connect, DB_USER, DB_PASS );

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ( isset($_GET['limit']) )
  {
    $limit = $_GET['limit'];
  } 
  else 
  {
    $limit = 1;
  }

  $item = $db->query("
  select title, img, desc_short from products
  join images on (products.id = images.product_id)
  limit $limit
  ")->fetchAll(PDO::FETCH_ASSOC);

} 
catch (PDOException $e)
{
  die( "ERROR: " . $e->getMessage() );
} 