<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_layout_header')) {
  function get_layout_header()
  {
    return get_instance()->load->view('templates/header', NULL, TRUE);
  }
}

if (!function_exists('get_layout_toolbar')) {
  function get_layout_toolbar()
  {
    return get_instance()->load->view('templates/toolbar', NULL, TRUE);
  }
}

if (!function_exists('get_layout_sidenav')) {
  function get_layout_sidenav()
  {
    return get_instance()->load->view('templates/sidenav', NULL, TRUE);
  }
}

if (!function_exists('get_layout_footer')) {
  function get_layout_footer()
  {
    return get_instance()->load->view('templates/footer', NULL, TRUE);
  }
}
