<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instructors extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('instructors_model');
  }

  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');
    if (!user_has_role('ADMIN')) redirect('/access_deny');

    $this->load->library('pagination');

    $instructors = $this->instructors_model->get_instructors();

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => count($instructors),
      'per_page' => 15,
    ]);

    $instructors_table_data = [
      'columns' => array(
        (object)['label' => 'Id', 'prop' => 'id'],
        (object)['label' => 'Nombre', 'prop' => 'name'],
        (object)['label' => 'Apellido paterno', 'prop' => 'first_surname'],
        (object)['label' => 'Apellido materno', 'prop' => 'second_surname'],
        (object)['label' => 'Teléfono', 'prop' => 'phone'],
        (object)['label' => 'Grado de estudios', 'prop' => 'degree']
      ),
      'rows' => $instructors,
    ];

    $toolbar_data = [
      'section_title' => 'Instructores',
      'entity_name' => 'instructor'
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/list_toolbar', $toolbar_data, TRUE),
      'has_rows' => count($instructors),
      'table' => $this->load->view('components/table', $instructors_table_data, TRUE),
      'pagination' => $this->pagination->create_links()
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/list_page', $list_data, TRUE)
    ]);
  }
}
