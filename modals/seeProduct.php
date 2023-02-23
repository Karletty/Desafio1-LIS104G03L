<div class="modal fade" id="modal_see_<?= $product->codigo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5"><?= $product->nombre ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body row">
                        <div class="col-4">
                              <img class="w-100" src="./img/<?= $product->codigo ?>" alt="">
                        </div>
                        <div class="col-8">
                              <p><b>Detalles del producto: </b><span class="details"><?= $product->descripcion ?></span></p>
                              <p><b>Categoría: </b><span class="details"><?= $product->categoria ?></span></p>
                              <p><b>Precio: </b><span class="price">$<?= number_format((float) $product->precio, 2, '.', '') ?></span></p>
                              <p><b>Cantidad en existencias: </b><span class="details"><?= $product->existencias > 0 ? $product->existencias : 'No hay existencias' ?></span></p>
                        </div>
                  </div>
            </div>
      </div>
</div>