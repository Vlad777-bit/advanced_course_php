<?php

$photo = scandir('./images/small');

function renderImg($size, $images) {
  for ($i = 2; $i < count($images); $i++) {?>

    <a href="images/big/<?= $images[$i] ?>" 
      data-fancybox="gallery" 
      data-caption="<?= $images[$i] ?>" 
      target="blank" class="img_link"
    >
      <img src="images/<?= $size . '/' . $images[$i] ?>" alt="photo" class="image">
    </a>
    
  <?php
  }
}

renderImg('small', $photo);