<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
  function is_logged_in()
  {
    $ci = get_instance();
    return $ci->session->userdata('logged_in');
  }
}

if (!function_exists('get_userdata')) {
  function get_userdata()
  {
    $ci = get_instance();
    return $ci->session->userdata();
  }
}

if (!function_exists('user_has_role')) {
  function user_has_role($role)
  {
    $ci = get_instance();
    return $ci->session->userdata('role') === $role;
  }
}
