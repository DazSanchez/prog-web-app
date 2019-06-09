<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('courses_model');
  }

  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $this->load->library('pagination');

    $per_page = $this->input->get('per_page') or 0;

    $courses = $this->courses_model->get_courses(PAGINATION_PER_PAGE, $per_page);

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => $this->courses_model->count_all_courses(),
      'per_page' => PAGINATION_PER_PAGE,
    ]);

    $courses_table_data = [
      'columns' => array(
        (object)['label' => 'Curso', 'prop' => 'course_name'],
        (object)['label' => 'Instructor', 'prop' => 'instructor_name'],
        (object)['label' => 'Horario', 'prop' => 'schedule'],
        (object)['label' => 'Fecha inicio', 'prop' => 'start_date'],
        (object)['label' => 'Fecha fin', 'prop' => 'end_date'],
        (object)['label' => 'Disponibilidad', 'prop' => 'capacity'],
        (object)['label' => 'Área', 'prop' => 'course_speciality'],
      ),
      'rows' => $courses,
    ];

    $toolbar_data = [
      'section_title' => 'Cursos',
      'entity_name' => 'curso'
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/list_toolbar', $toolbar_data, TRUE),
      'has_rows' => count($courses),
      'table' => $this->load->view('components/table', $courses_table_data, TRUE),
      'pagination' => $this->pagination->create_links()
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/list_page', $list_data, TRUE)
    ]);
  }
}
