<?= $toolbar ?>

<div class="m-3">
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
