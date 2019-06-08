<?php
$userdata = get_userdata();
?>

<nav class="navbar fixed-top navbar-dark bg-primary d-flex justify-content-between">
  <span class="navbar-brand mb-0 h1">
    Sistema de Inscripciones
  </span>
  <div class="d-flex align-items-center">
    <span class="text-white mr-4 font-weight-bold">
      @<?php echo $userdata['username']; ?>
    </span>

    <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-outline-light">
      <i class="fas fa-sign-out-alt"></i>
      Salir
    </a>
  </div>
</nav>
