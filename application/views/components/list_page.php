<div class="list-page">
  <div class="list-toolbar">
    <?= $toolbar ?>
  </div>

  <div class="list-page-content mx-3">
    <?php if ($this->session->flashdata('create_success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="far fa-check-circle"></i>
        <span class="font-weight-bold">
          <?= $success_message['title'] ?>
        </span>
        <?php if (isset($success_message['message'])) : ?>
          <?= $success_message['message'] ?>
        <?php endif; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="card shadow-sm">
      <div class="card-body">
        <?php if (isset($has_rows) && !$has_rows) : ?>
          <div class="alert alert-info m-0" role="alert">
            <i class="fas fa-info-circle"></i>
            Parece que no hay registros aún.
          </div>
        <?php else : ?>
          <?= $table ?>

          <?= $pagination ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
