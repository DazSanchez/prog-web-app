<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller
{
  function access_deny()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('errors/error_403', NULL, TRUE)
    ]);
  }

  function not_found()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('errors/error_404', NULL, TRUE)
    ]);
  }
}
