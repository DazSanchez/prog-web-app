<main class="page-content">
  <?= $toolbar ?>

  <div class="m-3">
    <div class="card">
      <div class="card-body">
        <?php if (isset($has_rows) && !$has_rows) : ?>
          <div class="alert alert-info" role="alert">
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

</main>
