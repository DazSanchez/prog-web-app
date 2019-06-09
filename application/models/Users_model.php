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

  public function get_users($per_page, $offset)
  {
    $this->db
      ->select('users.id, users.username, roles.name')
      ->from('users')
      ->join('roles', 'users.id_rol = roles.id')
      ->limit($per_page, $offset);

    return $this->db->get()->result();
  }

  public function count_all_users()
  {
    return $this->db->count_all('users');
  }

  public function create_user($user)
  {
    $this->db->insert('users', $user);
    return $this->db->error();
  }
}
