<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $this->load->view('templates/app_layout');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
