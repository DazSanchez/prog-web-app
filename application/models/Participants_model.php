<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Participants_model extends CI_Model
{
  public function get_participants($per_page, $offset)
  {
    return $this->db
      ->limit($per_page, $offset)
      ->get('participants')
      ->result();
  }

  public function count_all_participants()
  {
    return $this->db->count_all('participants');
  }
}
