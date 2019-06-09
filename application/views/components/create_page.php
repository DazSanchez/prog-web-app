<?= $toolbar ?>

<div class="m-3">
  <div class="card shadow-sm">
    <div class="card-body">
      <?php if ($has_errors) : ?>
        <div class="alert alert-danger" role="alert">
          <i class="far fa-times-circle"></i>
          <span class="font-weight-bold">
            Algunos campos no son válidos.
          </span>
          <?= validation_errors('<p class="m-0">', '</p>') ?>
        </div>
      <?php elseif ($this->session->flashdata('create_error')) : ?>
        <div class="alert alert-danger" role="alert">
          <i class="far fa-times-circle"></i>
          <span class="font-weight-bold">
            Ha ocurrido un error. Intente de nuevo.
          </span>
        </div>
      <?php endif; ?>

      <?= $form ?>
    </div>
  </div>
</div>
