<?php
$link = [
  'class' => 'nav-link'
];
?>

<aside class="sidenav">
  <nav class="nav flex-column">
    <?php echo anchor('/courses', 'Cursos', $link) ?>
    <?php echo anchor('/instructors', 'Instructores', $link) ?>
    <?php echo anchor('/participants', 'Participantes', $link) ?>
    <?php echo anchor('/users', 'Usuarios', $link) ?>
  </nav>
</aside>
