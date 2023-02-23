<div class="modal fade" id="modal_delete_<?= $product->codigo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5">Eliminar <?= $product->codigo ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body row">
                        <p class="danger">¿Está seguro? Esta acción no se puede deshacer</p>
                  </div>
                  <div class="modal-footer">
                        <a type="submit" class="btn btn-danger" href="./helpers/delete.php?prod=<?= $product->codigo ?>">Eliminar</a>
                  </div>
            </div>
      </div>
</div>