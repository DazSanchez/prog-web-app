<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_toolbar_data')) {
  function get_toolbar_data()
  {
    $ci = get_instance();
    return [
      'username' => $ci->session->userdata('username'),
    ];
  }
}
