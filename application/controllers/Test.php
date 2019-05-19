<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url'); // Cargar la funcion base_url()
	}

	public function index($page = "") {
		$this->load->view("templates/header");
		$this->load->view('test');
		$this->load->view("templates/footer");
	}
}
