<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	public function index() {
		$this->load->view("templates/header");
		$this->load->view("authentication/index");
		$this->load->view("templates/footer");
	}
}
