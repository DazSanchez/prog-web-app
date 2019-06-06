<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function login()
  {
    if ($this->session->userdata('logged_in')) redirect('');

    $this->form_validation->set_rules('username', 'Usuario', 'required');
    $this->form_validation->set_rules('password', 'Contraseña', 'required');

    if ($this->form_validation->run()) {
      $username = $this->input->post('username');
      $enc_password = md5($this->input->post('password'));
      $user_id = $this->user_model->login($username, $enc_password);

      if ($user_id) {
        $this->session->set_userdata([
          'user_id' => $user_id,
          'username' => $username,
          'logged_in' => TRUE
        ]);

        redirect('');
      } else {
        $this->session->set_flashdata('login_failed', TRUE);
        redirect('/auth/login');
      }
    } else {
      $this->load->view('templates/header');
      $this->load->view('auth/login_form');
      $this->load->view('templates/footer');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();

    redirect('/auth/login');
  }
}
