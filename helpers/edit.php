<?php
if (isset($_POST['save'])) {
      $products = simplexml_load_file("../store/productos.xml");
      $cod = $_POST['product-cod'];
      $folder = '../img/';

      if (isset($_FILES["product-img"])) {
            if ($_FILES["product-img"]["type"] == "image/jpeg") {
                  if (file_exists($folder)) {
                        $origin = $_FILES["product-img"]["tmp_name"];
                        $destiny = $folder . $cod . ".jpg";
                        if (@move_uploaded_file($origin, $destiny)) {
                              echo "<br>" . $_FILES["product-img"]["name"] . " movido correctamente";
                        } else {
                              echo "<br>No se ha podido mover el archivo: " . $_FILES["product-img"]["name"];
                        }
                  }
            }
      }

      foreach ($products->producto as $product) {
            if ($product->codigo == $cod) {
                  if (strlen($_POST['product-name'])) {
                        $product->nombre = $_POST['product-name'];
                  }
                  if (strlen($_POST['product-des'])) {
                        $product->descripcion = $_POST['product-des'];
                  }
                  if (strlen($_POST['product-cat'])) {
                        $product->categoria = $_POST['product-cat'];
                  }
                  if (is_numeric($_POST['product-price']) && $_POST['product-price'] > 0) {
                        $product->precio = $_POST['product-price'];
                  }
                  if (is_numeric($_POST['product-stock']) && $_POST['product-stock'] >= 0) {
                        $product->existencias = $_POST['product-stock'];
                  }
                  break;
            }
      }
      file_put_contents("../store/productos.xml", $products->asXML());
      header('location:../admin.php');
}
