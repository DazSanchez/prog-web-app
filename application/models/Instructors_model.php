<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Instructors_model extends CI_Model
{
  function get_instructors()
  {
    return $this->db->get('instructors')->result();
  }
}
