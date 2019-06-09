<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('INSTRUCTOR_DEGREES', [
  'Técnico',
  'Tenólogo',
  'Licenciado',
  'Ingeniero',
  'Doctor',
  'Maestro',
  'Postgrado'
]);

if (!function_exists('get_degrees')) {
  function get_degrees()
  {
    return INSTRUCTOR_DEGREES;
  }
}

if (!function_exists('get_degree')) {
  function get_degree($index)
  {
    return INSTRUCTOR_DEGREES[$index];
  }
}
