<?php

class User_model extends CI_Model {

  public function login($username, $password) {
    $predicate = [
      'username' => $username,
      'password' => $password
    ];
    $user = $this->db->get_where('users', $predicate)->row();

    if(!empty($user)) {
      return $user->id;
    }
    return false;
  }
}
