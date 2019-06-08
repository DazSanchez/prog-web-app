<div class="list-page">
  <div class="list-toolbar">
    <?= $toolbar ?>
  </div>

  <div class="mx-3 list-page-content">
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
