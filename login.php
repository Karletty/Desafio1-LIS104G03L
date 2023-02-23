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
                  <a href="./index.php" class="btn btn-light mx-4">Soy un cliente</a>
            </div>
      </header>
      <main>
            <div class="card">
                  <div class="card-header">
                        <h1>Login</h1>
                  </div>
                  <form method="POST">
                        <div class="card-body">
                              <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                              </div>
                              <div class="mb-3">
                                    <label for="pass" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="pass" id="pass">
                              </div>
                              <?php
                              $wrongData = true;
                              if (isset($_POST['login']) && $wrongData) {
                              ?>
                                    <div class="invalid-feedback">
                                          Las credenciales no coinciden.
                                    </div>
                              <?php
                              }
                              ?>
                        </div>
                        <div class="card-footer">
                              <button name="login" class="btn btn-primary">Ingresar</button>
                        </div>
                  </form>

                  <?php
                  $employees = simplexml_load_file('./store/empleados.xml');

                  if (isset($_POST['login'])) {
                        foreach ($employees as $employee) {
                              if ($_POST['email'] == $employee->email && $_POST['pass'] == $employee->pass) {
                                    $wrongData = false;
                                    header('location:admin.php?login=true');
                              }
                        }
                  }
                  ?>
            </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="./js//verify.js"></script>
</body>

</html>