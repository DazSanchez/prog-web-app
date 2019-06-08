<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

  public function login($username, $password)
  {
    $predicate = [
      'username' => $username,
      'password' => $password
    ];

    $user = $this->db
      ->select('*, roles.name as role')
      ->join('roles', 'users.id_rol = roles.id')
      ->get_where('users', $predicate)
      ->row();

    if (!empty($user)) {
      return $user;
    }
    return false;
  }

  public function get_users()
  {
    $this->db
      ->select('users.id, users.username, roles.name')
      ->from('users')
      ->join('roles', 'users.id_rol = roles.id');

    return $this->db->get()->result();
  }

  public function create_user($user)
  {
    $this->db->insert('users', $user);
    return $this->db->error();
  }
}
