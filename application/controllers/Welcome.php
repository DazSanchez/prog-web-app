<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  function index()
  {
    if (!is_logged_in()) {
      redirect('/auth/login');
    }

    $toolbar_data = [
      'username' => $this->session->userdata('username')
    ];

    $this->load->view('templates/header');
    $this->load->view('components/admin_toolbar', $toolbar_data);
    $this->load->view('templates/sidenav');
    $this->load->view('templates/footer');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
