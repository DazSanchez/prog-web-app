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

$config = [
  'login' => $login,
  'create_user' => $create_user
];
