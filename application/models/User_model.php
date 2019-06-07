<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function login($username, $password)
  {
    $predicate = [
      'username' => $username,
      'password' => $password
    ];
    $user = $this->db->get_where('users', $predicate)->row();

    if (!empty($user)) {
      return $user->id;
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
}
