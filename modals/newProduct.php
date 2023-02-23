<div class="modal fade" id="modal_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5">Agregar un producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="./helpers/add.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body row">
                              <div class="mb-3">
                                    <lable class="form-label">Código</lable>
                                    <input name="product-cod" id="product-cod" type="text" class="form-control">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Nombre</lable>
                                    <input name="product-name" id="product-name" type="text" class="form-control">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Descripción</lable>
                                    <textarea name="product-des" id="product-des" class="form-control" cols="30" rows="5"></textarea>
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Categoría</lable>
                                    <input name="product-cat" id="product-cat" type="text" class="form-control">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Nueva imagen</lable>
                                    <input name="product-img" id="product-img" type="file" class="form-control" value="Cambiar imagen" accept="image/png,image/jpeg">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Precio</lable>
                                    <input name="product-price" id="product-price" type="text" class="form-control">
                              </div>
                              <div class="mb-3">
                                    <lable class="form-label">Existencias</lable>
                                    <input name="product-stock" id="product-stock" type="text" class="form-control">
                              </div>
                        </div>
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="add">Agregar registro</button>
                        </div>
                  </form>
            </div>
      </div>
</div>