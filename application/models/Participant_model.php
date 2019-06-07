<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Participant_model extends CI_Model
{
  public function get_participants()
  {
    return $this->db->get('participants')->result();
  }
}
