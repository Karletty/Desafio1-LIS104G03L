<?php

function validate($key)
{
      return  isset($_POST[$key]);
}

function validateAll()
{
      $codRegex = "/^PROD[0-9]{5}$/";
      return (validate('product-cod') &&
            preg_match($codRegex, $_POST['product-cod']) &&
            validate('product-name') &&
            validate('product-des') &&
            validate('product-cat') &&
            (strtolower($_POST['product-cat']) == "textil" ||
                  strtolower($_POST['product-cat']) == "promocional") &&
            is_numeric($_POST['product-price']) &&
            $_POST['product-price'] > 0 &&
            is_numeric($_POST['product-stock']) &&
            $_POST['product-stock'] >= 0);
}

if (isset($_POST['add'])) {
      $products = simplexml_load_file("../store/productos.xml");
      $cod = $_POST['product-cod'];
      $codExists = false;

      foreach ($products->producto as $product) {
            if ($product->codigo == $cod) {
                  $codExists = true;
                  break;
            }
      }

      $folder = '../img/';
      if (validateAll() && !$codExists) {
            if (isset($_FILES["product-img"])) {
                  if ($_FILES["product-img"]["type"] == "image/jpeg" || $_FILES["product-img"]["type"] == "image/png") {
                        if (file_exists($folder)) {
                              if ($_FILES["product-img"]["type"] == "image/jpeg")
                                    $extension = ".jpg";
                              else
                                    $extension = ".png";
                              $origin = $_FILES["product-img"]["tmp_name"];
                              $destiny = $folder . $cod . $extension;
                              if (@move_uploaded_file($origin, $destiny)) {
                                    $product = $products->addChild('producto');
                                    $product->addChild('codigo', $cod);
                                    $product->addChild('nombre', $_POST["product-name"]);
                                    $product->addChild('descripcion', $_POST["product-des"]);
                                    $product->addChild('img', $cod . $extension);
                                    $product->addChild('categoria', $_POST["product-cat"]);
                                    $product->addChild('precio', $_POST["product-price"]);
                                    $product->addChild('existencias', $_POST["product-stock"]);
                              }
                        }
                  }
            }
      }

      file_put_contents("../store/productos.xml", $products->asXML());
      header('location:../admin.php');
}
