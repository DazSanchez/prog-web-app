<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');
    if (!user_has_role('ADMIN')) redirect('/access_deny');

    $this->load->library('pagination');

    $users = $this->user_model->get_users();

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => count($users),
      'per_page' => 15,
    ]);

    $users_table_data = [
      'columns' => array(
        (object)['label' => 'Id', 'prop' => 'id'],
        (object)['label' => 'Usuario', 'prop' => 'username'],
        (object)['label' => 'Rol', 'prop' => 'name'],
      ),
      'rows' => $users,
    ];

    $toolbar_data = [
      'section_title' => 'Usuarios',
      'entity_name' => 'usuario'
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/list_toolbar', $toolbar_data, TRUE),
      'table' => $this->load->view('components/table', $users_table_data, TRUE),
      'pagination' => $this->pagination->create_links()
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/list_page', $list_data, TRUE)
    ]);
  }
}
