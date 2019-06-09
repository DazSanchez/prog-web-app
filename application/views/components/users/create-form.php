<?php
$username = [
  'class' => 'form-control',
  'id' => 'username',
  'name' => 'username',
  'value' => $has_errors ? set_value('username') : '',
  'required' => 'required',
  'minlength' => 6,
  'maxlength' => 16
];
$password = [
  'class' => 'form-control',
  'id' => 'password',
  'name' => 'password',
  'value' => $has_errors ? set_value('password') : '',
  'required' => 'required',
  'minlength' => 8,
  'maxlength' => 24
];
$role = [
  'id' => 'id_rol',
  'name' => 'id_rol',
  'required' => 'required',
  'class' => 'form-control'
];
$submit = [
  'class' => 'btn btn-primary js-save-btn',
  'type' => 'submit',
  'content' => '<i class="far fa-save"></i> Guardar'
];
$cancel = [
  'class' => 'btn btn-light mr-2'
];
?>

<?= form_open(current_url(), ['class' => 'js-form']) ?>
<div class="d-flex">
  <div class="form-group mr-3">
    <?= form_label('Usuario', $username['id']) ?>
    <?= form_input($username) ?>
  </div>

  <div class="form-group mr-3">
    <?= form_label('Contraseña', $password['id']) ?>
    <?= form_password($password) ?>
  </div>

  <div class="form-group">
    <?= form_label('Rol', $role['id']) ?>
    <select <?= _attributes_to_string($role) ?>>
      <?php foreach ($roles as $rol) : ?>
        <option value=<?= $rol->id ?>>
          <?= $rol->name ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="d-flex justify-content-end">
  <?= anchor(site_url('/users'), 'Cancelar', $cancel) ?>
  <?= form_button($submit) ?>
</div>
<?= form_close() ?>
