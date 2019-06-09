<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$login = [
  [
    'field' => 'username',
    'label' => 'Usuario',
    'rules' => 'required'
  ],
  [
    'field' => 'password',
    'label' => 'Contraseña',
    'rules' => 'required'
  ],
];

$create_user = [
  [
    'field' => 'username',
    'label' => 'Usuario',
    'rules' => [
      'trim',
      'required',
      'min_length[6]',
      'max_length[16]',
      'alpha_numeric',
      'is_unique[users.username]'
    ]
  ],
  [
    'field' => 'password',
    'label' => 'Contraseña',
    'rules' => ['trim', 'required', 'min_length[8]', 'max_length[24]']
  ],
  [
    'field' => 'id_rol',
    'label' => 'Rol',
    'rules' => 'required'
  ],
];

$create_instructor = [
  [
    'field' => 'name',
    'label' => 'Nombre',
    'rules' => ['required']
  ],
  [
    'field' => 'first_surname',
    'label' => 'Apellido paterno',
    'rules' => ['required']
  ],
  [
    'field' => 'second_surname',
    'label' => 'Apellido materno',
    'rules' => ['required']
  ],
  [
    'field' => 'phone',
    'label' => 'Teléfono',
    'rules' => ['required', 'numeric', 'min_length[10]', 'max_length[10]']
  ],
  [
    'field' => 'email',
    'label' => 'Correo',
    'rules' => ['required', 'valid_email']
  ],
  [
    'field' => 'address',
    'label' => 'Dirección',
    'rules' => ['required', 'alpha_numeric_spaces']
  ],
  [
    'field' => 'state',
    'label' => 'Estado',
    'rules' => ['required']
  ],
  [
    'field' => 'city',
    'label' => 'Ciudad',
    'rules' => ['required']
  ],
  [
    'field' => 'degree',
    'label' => 'Grado de estudio',
    'rules' => ['required']
  ],
];

$config = [
  'login' => $login,
  'create_user' => $create_user,
  'create_instructor' => $create_instructor
];
