<?php
$link = [
  'class' => 'nav-link'
];
?>

<aside class="sidenav shadow-sm">
  <nav class="nav flex-column">
    <?= anchor('/courses', 'Cursos', $link) ?>
    <?php if (user_has_role('ADMIN')) : ?>
      <?= anchor('/instructors', 'Instructores', $link) ?>
      <?= anchor('/participants', 'Participantes', $link) ?>
      <?= anchor('/users', 'Usuarios', $link) ?>
    <?php endif; ?>
  </nav>
</aside>
