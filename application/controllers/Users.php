<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $this->load->library('pagination');

    $users = $this->user_model->get_users();

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => count($users),
      'per_page' => 15,
    ]);

    $toolbar_data = [
      'username' => $this->session->userdata('username'),
    ];

    $users_table_data = [
      'columns' => array(
        (object)['label' => 'Id', 'prop' => 'id'],
        (object)['label' => 'Usuario', 'prop' => 'username'],
        (object)['label' => 'Rol', 'prop' => 'name'],
      ),
      'rows' => $users,
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/users/toolbar', NULL, TRUE),
      'users_table' => $this->load->view('components/table', $users_table_data, TRUE),
      'pagination' => $this->pagination->create_links()
    ];

    $this->load->view('templates/header');
    $this->load->view('components/admin_toolbar', $toolbar_data);
    $this->load->view('templates/sidenav');
    $this->load->view('users/list', $list_data);
    $this->load->view('templates/footer');
  }
}
