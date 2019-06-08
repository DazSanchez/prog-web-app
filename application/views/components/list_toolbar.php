<div class="navbar navbar-light bg-light d-flex justify-content-between shadow-sm">
  <span class="navbar-brand font-weight-bold">
    <?= $section_title ?>
  </span>

  <?php if (user_has_role('ADMIN')) : ?>
    <a href=<?= current_url() . "/create" ?> class="btn btn-primary">
      <i class="fas fa-plus"></i>
      Agregar <?= $entity_name ?>
    </a>
  <?php endif; ?>
</div>
