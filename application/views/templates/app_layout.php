<?= get_layout_header() ?>
<?= get_layout_toolbar() ?>
<?= get_layout_sidenav() ?>

<?php if (isset($content)) : ?>
  <main class="page-content">
    <?= $content ?>
  </main>
<?php endif; ?>

<?= get_layout_footer() ?>
