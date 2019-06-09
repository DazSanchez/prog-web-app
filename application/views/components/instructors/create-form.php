<?php
$name = [
  'class' => 'form-control ' . (form_error('name') ? 'is-invalid' : ''),
  'id' => 'name',
  'name' => 'name',
  'required' => 'required',
  'value' => $has_errors ? set_value('name') : '',
  'tabindex' => 1
];
$first_surname = [
  'class' => 'form-control ' . (form_error('first_surname') ? 'is-invalid' : ''),
  'id' => 'first-surname',
  'name' => 'first_surname',
  'required' => 'required',
  'value' => $has_errors ? set_value('first_surname') : '',
  'tabindex' => 2
];
$second_surname = [
  'class' => 'form-control ' . (form_error('second_surname') ? 'is-invalid' : ''),
  'id' => 'second-surname',
  'name' => 'second_surname',
  'required' => 'required',
  'value' => $has_errors ? set_value('second_surname') : '',
  'tabindex' => 3
];
$phone = [
  'class' => 'form-control ' . (form_error('phone') ? 'is-invalid' : ''),
  'id' => 'phone',
  'name' => 'phone',
  'required' => 'required',
  'value' => $has_errors ? set_value('phone') : '',
  'tabindex' => 4,
  'type' => 'tel',
  'maxlength' => 10
];
$email = [
  'class' => 'form-control ' . (form_error('email') ? 'is-invalid' : ''),
  'id' => 'email',
  'name' => 'email',
  'required' => 'required',
  'value' => $has_errors ? set_value('email') : '',
  'tabindex' => 5
];
$address = [
  'class' => 'form-control ' . (form_error('address') ? 'is-invalid' : ''),
  'id' => 'address',
  'name' => 'address',
  'required' => 'required',
  'value' => $has_errors ? set_value('address') : '',
  'tabindex' => 6
];
$state = [
  'class' => 'form-control ' . (form_error('state') ? 'is-invalid' : ''),
  'id' => 'state',
  'name' => 'state',
  'required' => 'required',
  'value' => $has_errors ? set_value('state') : '',
  'tabindex' => 7
];
$city = [
  'class' => 'form-control ' . (form_error('city') ? 'is-invalid' : ''),
  'id' => 'city',
  'name' => 'city',
  'required' => 'required',
  'value' => $has_errors ? set_value('city') : '',
  'tabindex' => 8
];
$degree = [
  'class' => 'form-control ' . (form_error('degree') ? 'is-invalid' : ''),
  'id' => 'degree',
  'name' => 'degree',
  'required' => 'required',
  'value' => $has_errors ? set_value('degree') : '',
  'tabindex' => 9
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
<div class="d-flex justify-content-between">
  <div class="d-flex flex-column mr-3">
    <div class="d-flex">
      <div class="form-group mr-3">
        <?= form_label('Nombre', $name['id']) ?>
        <?= form_input($name) ?>
      </div>
      <div class="form-group">
        <?= form_label('Apellido paterno', $first_surname['id']) ?>
        <?= form_input($first_surname) ?>
      </div>
    </div>
    <div class="d-flex">
      <div class="form-group flex-fill">
        <?= form_label('Dirección', $address['id']) ?>
        <?= form_input($address) ?>
      </div>
    </div>
  </div>

  <div class="d-flex flex-column mr-3">
    <div class="form-group">
      <?= form_label('Apellido materno', $second_surname['id']) ?>
      <?= form_input($second_surname) ?>
    </div>
    <div class="form-group">
      <?= form_label('Estado <i class="fas fa-circle-notch fa-spin" id="state-loader"></i>', $state['id']) ?>
      <select <?= _attributes_to_string($state) ?>></select>
    </div>
  </div>

  <div class="d-flex flex-column mr-3">
    <div class="form-group">
      <?= form_label('Teléfono', $phone['id']) ?>
      <?= form_input($phone) ?>
    </div>
    <div class="form-group">
      <?= form_label('Ciudad <i class="fas fa-circle-notch fa-spin" id="city-loader"></i>', $city['id']) ?>
      <select <?= _attributes_to_string($city) ?>></select>
    </div>
  </div>

  <div class="d-flex flex-column">
    <div class="form-group">
      <?= form_label('Correo electrónico', $email['id']) ?>
      <?= form_input($email) ?>
    </div>
    <div class="form-group">
      <?= form_label('Grado de estudios', $degree['id']) ?>
      <select <?= _attributes_to_string($degree) ?>>
        <?php foreach (get_degrees() as $index => $degree) : ?>
          <option value="<?= $index ?>">
            <?= $degree ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<div class="d-flex justify-content-end">
  <?= anchor(site_url('/users'), 'Cancelar', $cancel) ?>
  <?= form_button($submit) ?>
</div>
<?= form_close() ?>
