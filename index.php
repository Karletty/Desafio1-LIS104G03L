<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
      <header class="row">
            <div class="column">
                  <img src="./img/others/logo.png" alt="" class="logo">
                  <h1>TextilExport</h1>
            </div>
            <div class="column justify-content-end">
                  <a href="./login.php" class="btn btn-light mx-4">Soy un empleado</a>
            </div>
      </header>
      <main>
            <form action="" method="get" id="search-form">
                  <div class="d-flex align-items-end mb-5">
                        <div class="me-3">
                              <label for="name-search" class="form-label mb-3">Nombre</label>
                              <input type="text" class="form-control" name="name-search" id="name-search">
                        </div>
                        <div class="me-3">
                              <label for="category-search" class="form-label mb-3">Categoría</label>
                              <input type="text" class="form-control" name="category-search" id="category-search">
                        </div>
                        <div class="me-3">
                              <label for="min-price-search" class="form-label mb-3">Precio mínimo</label>
                              <input type="text" class="form-control" name="min-price-search" id="min-price-search">
                        </div>
                        <div class="me-3">
                              <label for="max-price-search" class="form-label mb-3">Precio máximo</label>
                              <input type="text" class="form-control" name="max-price-search" id="max-price-search">
                        </div>
                        <button type="button" class="btn btn-info my-0 mx-1" id="btn-search">Filtrar</button>
                        <button type="button" class="btn btn-danger my-0 mx-1" id="btn-delete-filters">Borrar filtros</button>
                  </div>
            </form>
            <div class="grid">
                  <?php
                  function printProduct($product)
                  {
                  ?>
                        <div class="card">
                              <img src="./img/<?= $product->img ?>" class="card-img-top" alt="...">
                              <div class="card-header">
                                    <h6 class="card-title"><?= $product->nombre ?></h6>
                              </div>
                              <div class="card-body row">
                                    <div class="col">
                                          <p class="card-text details"><?= $product->categoria ?></p>
                                    </div>
                                    <div class="col">
                                          <p class="card-text text-end price">$<?= number_format((float) $product->precio, 2, '.', '') ?></p>
                                    </div>
                              </div>
                              <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_see_<?= $product->codigo ?>">Ver detalle</button>
                              </div>
                        </div>
                  <?php
                        include('./modals/seeProduct.php');
                  }
                  $products = simplexml_load_file('./store/productos.xml');


                  foreach ($products as $product) {
                        $control = true;
                        if (isset($_GET['name'])) {
                              $control = $control && str_contains(strtolower($product->nombre), $_GET['name']);
                        }
                        if (isset($_GET['category'])) {
                              $control = $control && str_contains(strtolower($product->categoria), $_GET['category']);
                        }
                        if (isset($_GET['min-price'])) {
                              if (is_numeric($_GET['min-price']))
                                    $control = $control && $product->precio > $_GET['min-price'];
                        }
                        if (isset($_GET['max-price'])) {
                              if (is_numeric($_GET['max-price']))
                                    $control = $control && $product->precio < $_GET['max-price'];
                        }
                        if ($control) {
                              printProduct($product);
                        }
                  }
                  ?>
            </div>

      </main>
      <script src="./js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>