<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');
    if (!user_has_role('ADMIN')) redirect('/access_deny');

    $this->load->library('pagination');

    $users = $this->users_model->get_users();

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

  function create()
  {
    $this->load->model('roles_model');

    if ($this->form_validation->run('create_user')) {
      $user = $this->input->post();
      $user['password'] = md5($user['password']);

      $db_error = $this->users_model->create_user($user);

      if (!empty($db_error)) {
        $this->session->set_flashdata('create_success', TRUE);
      } else {
        $this->session->set_flashdata('create_error', TRUE);
      }
    }

    $has_errors = count($this->form_validation->error_array());

    $form_data = [
      'has_errors' => $has_errors,
      'roles' => $this->roles_model->get_roles()
    ];

    $create_data = [
      'toolbar' => $this->load->view(
        'components/title_toolbar',
        ['title' => 'Agregar usuario'],
        TRUE
      ),
      'form' => $this->load->view(
        'components/users/create-form',
        $form_data,
        TRUE
      ),
      "has_errors" => $has_errors
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('users/create', $create_data, TRUE)
    ]);
  }
}
