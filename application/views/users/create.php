<?= $toolbar ?>

<div class="m-3">
  <div class="card shadow-sm">
    <div class="card-body">
      <?php if ($this->session->flashdata('create_success')) : ?>
        <div class="alert alert-success" role="alert">
          <i class="far fa-check-circle"></i>
          <span class="font-weight-bold">
            Se ha creado el usuario.
          </span>
          Ahora puede iniciar sesión en el sistema.
        </div>
      <?php elseif ($has_errors) : ?>
        <div class="alert alert-danger" role="alert">
          <i class="far fa-times-circle"></i>
          <span class="font-weight-bold">
            Algunos campos no son válidos.
          </span>
          <?= validation_errors() ?>
        </div>
      <?php elseif ($this->session->flashdata('create_error')) : ?>
        <div class="alert alert-danger" role="alert">
          <i class="far fa-times-circle"></i>
          <span class="font-weight-bold">
            Ha ocurrido un error creando al usuario. Intente de nuevo.
          </span>
        </div>
      <?php endif; ?>

      <?= $form ?>
    </div>
  </div>
</div>
