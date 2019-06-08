<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends CI_Model
{

  function get_roles()
  {
    return $this->db->get('roles')->result();
  }
}
