<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instructors extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('instructors_model');
    $this->load->helper('degree');
  }

  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');
    if (!user_has_role('ADMIN')) redirect('/access_deny');

    $this->load->library('pagination');

    $per_page = $this->input->get('per_page') or 0;

    $instructors = $this->instructors_model->get_instructors(PAGINATION_PER_PAGE, $per_page);

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => $this->instructors_model->count_all_instructors(),
      'per_page' => PAGINATION_PER_PAGE,
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
      'rows' => array_map(function ($instructor) {
        $instructor->degree = get_degree($instructor->degree);
        return $instructor;
      }, $instructors),
    ];

    $toolbar_data = [
      'section_title' => 'Instructores',
      'entity_name' => 'instructor'
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/list_toolbar', $toolbar_data, TRUE),
      'has_rows' => count($instructors),
      'table' => $this->load->view('components/table', $instructors_table_data, TRUE),
      'pagination' => $this->pagination->create_links(),
      'success_message' => [
        'title' => 'Se ha creado al instructor.'
      ]
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/list_page', $list_data, TRUE)
    ]);
  }

  function create()
  {
    if ($this->form_validation->run('create_instructor')) {
      $instructor = $this->input->post();

      $db_error = $this->instructors_model->create_instructor($instructor);

      if (!empty($db_error)) {
        $this->session->set_flashdata('create_success', TRUE);
        redirect('/instructors');
      } else {
        $this->session->set_flashdata('create_error', TRUE);
      }
    }

    $has_errors = count($this->form_validation->error_array());

    $form_data = [
      'has_errors' => $has_errors
    ];

    $create_data = [
      'toolbar' => $this->load->view(
        'components/title_toolbar',
        ['title' => 'Agregar instructor'],
        TRUE
      ),
      'form' => $this->load->view(
        'components/instructors/create-form',
        $form_data,
        TRUE
      ),
      'has_errors' => $has_errors
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/create_page', $create_data, TRUE)
    ]);
  }
}
