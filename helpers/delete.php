<?php
$cod = $_GET['prod'];
$products = simplexml_load_file("../store/productos.xml");
$i = 0;
$index = -1;

foreach ($products->producto as $prod) {
      if ($prod->codigo == $cod) {
            $index = $i;
            break;
      }
      $i++;
}

if ($index >= 0) {
      unset($products->producto[$index]);
      file_put_contents("../store/productos.xml", $products->asXML());
}

header('location:../admin.php');
