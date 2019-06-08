<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Participants extends CI_Controller
{
  function index()
  {
    if (!is_logged_in()) redirect('/auth/login');

    $participants = $this->participant_model->get_participants();

    $this->load->library('pagination');

    $this->pagination->initialize([
      'base_url' => current_url(),
      'total_rows' => count($participants),
      'per_page' => 15,
    ]);

    $participants_table_data = [
      'columns' => array(
        (object)['label' => 'Id', 'prop' => 'id'],
        (object)['label' => 'Nombre', 'prop' => 'name'],
        (object)['label' => 'Apellido paterno', 'prop' => 'first_surname'],
        (object)['label' => 'Apellido materno', 'prop' => 'second_surname'],
        (object)['label' => 'Teléfono', 'prop' => 'phone'],
      ),
      'rows' => $participants,
    ];

    $toolbar_data = ['section_name' => 'participante'];

    $toolbar_data = [
      'section_title' => 'Participantes',
      'entity_name' => 'participante'
    ];

    $list_data = [
      'toolbar' => $this->load->view('components/list_toolbar', $toolbar_data, TRUE),
      'has_rows' => count($participants),
      'table' => $this->load->view('components/table', $participants_table_data, TRUE),
      'pagination' => $this->pagination->create_links()
    ];

    $this->load->view('templates/app_layout', [
      'content' => $this->load->view('components/list_page', $list_data, TRUE)
    ]);
  }
}
