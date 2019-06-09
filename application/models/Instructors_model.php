<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instructors_model extends CI_Model
{
  function get_instructors($per_page, $offset)
  {
    return $this->db
      ->limit($per_page, $offset)
      ->get('instructors')
      ->result();
  }

  function count_all_instructors()
  {
    return $this->db->count_all('instructors');
  }

  function create_instructor($instructor)
  {
    $this->db->insert('instructors', $instructor);
    return $this->db->error();
  }
}
