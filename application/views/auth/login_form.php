<?php
$username = array(
  'name'  => 'username',
  'id'  => 'username',
  'value' => set_value('username'),
  'maxlength'  => 80,
  'size'  => 30,
  'class' => 'form-control',
  'placeholder' => 'Usuario',
  'required' => 'required'
);
$password = array(
  'name'  => 'password',
  'id'  => 'password',
  'size'  => 30,
  'class' => 'form-control',
  'placeholder' => 'Contraseña',
  'required' => 'required'
);
$submit = array(
  'name' => 'submit',
  'value' => 'Ingresar',
  'class' => 'btn btn-primary btn-block'
)
?>

<nav class="navbar navbar-dark bg-primary">
  <span class="navbar-brand mb-0 h1">Sistema de Inscripciones</span>
</nav>

<div class="d-flex justify-content-center align-items-center full-height">
  <div class="card shadow-sm">
    <div class="card-body">
      <p class="h4 card-title">
        Iniciar sesión
      </p>
      <?php if ($this->session->flashdata('login_failed')) : ?>
        <div class="alert alert-danger" role="alert">
          <i class="fas fa-exclamation-circle"></i>
          Estas credenciales no son válidas.
        </div>
      <?php endif; ?>
      <?php echo form_open('auth/login'); ?>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
        </div>
        <?php echo form_input($username); ?>
        <div class="invalid-feedback">
          <?php echo form_error($username['name']); ?>
        </div>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-lock"></i>
          </span>
        </div>
        <?php echo form_password($password); ?>
        <div class="invalid-feedback">
          <?php echo form_error($password['name']); ?>
        </div>
      </div>

      <?php echo form_submit($submit); ?>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
