<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
      <header class="row">
            <div class="column">
                  <img src="./img/others/logo.png" alt="" class="logo">
                  <h1>TextilExport</h1>
            </div>
      </header>
      <main>
            <div>
                  <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal_new">Agregar producto</button>
                  <?php include('./modals/newProduct.php') ?>
            </div>
            <div class="table-container">
                  <table class="table table-striped table-hover table-bordered">
                        <thead>
                              <tr>
                                    <th>Producto</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Existencias</th>
                                    <th>Acciones</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php
                              $products = simplexml_load_file('./store/productos.xml');

                              foreach ($products as $product) {
                              ?>
                                    <tr>
                                          <td><img src="./img/<?= $product->img ?>" alt="" class="table-img"></td>
                                          <td><?= $product->codigo ?></td>
                                          <td><?= $product->nombre ?></td>
                                          <td>$<?= number_format((float) $product->precio, 2, '.', '') ?></td>
                                          <td><?= $product->categoria ?></td>
                                          <td><?= $product->existencias ?></td>
                                          <td>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_edit_<?= $product->codigo ?>"><i class="bi bi-pencil-square"></i></button>
                                                <?php
                                                include('./modals/editProduct.php');
                                                ?>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_delete_<?= $product->codigo ?>"><i class="bi bi-trash3"></i></button>
                                                <?php
                                                include('./modals/deleteProduct.php');
                                                ?>
                                          </td>
                                    </tr>
                              <?php
                              }
                              ?>
                        </tbody>
                  </table>
            </div>
      </main>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="./js/verify.js"></script>
</body>

</html>