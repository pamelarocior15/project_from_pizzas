<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar Productos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">INGRESO DE PRODUCTOS</h3>
      </div>
      <div class="col-md-12">
        <form class="from-group" accept-charset="utf-8" action="save_products.php" method="post" enctype="multipart/form-data">
          <div class="from-group">
            <br>
            <label class="control-label" for="producto">
              PRODUCTO </label>
            <input type="text" required=" " placeholder="producto" class="form-control" id="producto" name="producto">
          </div>
          <div class="from-group">
            <br>
            <label class="control-label" for="precio">
              PRECIO </label>
            <input type="text" required=" " placeholder="precio" class="form-control" id="precio" name="precio">
          </div>
          <div class="from-group">
            <br>
            <label class="control-label" for="categoria">
              CATEGORIA DEL PRODUCTO </label>
            <select id="categoria" name="categoria" class="form-control">
              <?php
              include_once("config_products.php");
              include_once("db.php");
              $link = new Db();
              $sql = "SELECT id_category, category_name from categories order by category_name ASC;";
              $stmt = $link->prepare($sql);
              $stmt->execute();
              $data = $stmt->fetchAll();
              foreach ($data as $row) {
                echo '<option value="' . $row['id_category'] . '">' . $row['category_name'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <br>
            <label class="control-label" for="file"> SELECCIONE LA IMAGEN A SUBIR </label>
            <input type="file" id="imagen" class="form-control" name="imagen" size="30">
          </div>
          <div class="text-center">
            <br>
            <input type="submit" class="btn btn-success" value="Añadir Producto">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>