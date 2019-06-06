<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  function index()
  {
    if (!$this->session->userdata('logged_in')) {
      redirect('/auth/login');
    } else {
      die('Welcome');
    }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
