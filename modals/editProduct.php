<div class="modal fade" id="modal_edit_<?= $product->codigo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5">Editar <?= $product->codigo ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="./helpers/edit.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body row">
                              <div class="mb-3">
                                    <lable class="form-label">Código</lable>
                                    <input name="product-cod" id="product-cod" type="text" class="form-control" value="<?= $product->codigo ?>" disable>
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Nombre</lable>
                                    <input name="product-name" id="product-name" type="text" class="form-control" value="<?= $product->nombre ?>">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Descripción</lable>
                                    <textarea name="product-des" id="product-des" class="form-control" cols="30" rows="5"><?= $product->descripcion ?></textarea>
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Categoría</lable>
                                    <input name="product-cat" id="product-cat" type="text" class="form-control" value="<?= $product->categoria ?>">
                              </div>
                              <div class="mb-3">
                                    <div class="row">
                                          <div class="col w-25 d-flex flex-column">
                                                <lable class="form-label">Imagen actual</lable>
                                                <img src="./img/<?= $product->img ?>" alt="" id="img-edit">
                                          </div>
                                          <div class="col w-50">
                                                <lable class="form-label">Nueva imagen</lable>
                                                <input name="product-img" id="product-img" type="file" class="form-control" value="Cambiar imagen" accept="image/png,image/jpeg">
                                          </div>
                                    </div>
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Precio</lable>
                                    <input name="product-price" id="product-price" type="text" class="form-control" value="<?= $product->precio ?>">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Existencias</lable>
                                    <input name="product-stock" id="product-stock" type="text" class="form-control" value="<?= $product->existencias ?>">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="save">Guardar cambios</button>
                        </div>
                  </form>
            </div>
      </div>
</div>