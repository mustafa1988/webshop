<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['wee']  = 'hej hej';
		$this->data['wee1'] = 'hej hej1';
		$this->data['wee2'] = 'hej hej2';
		$this->view         = 'welcome_message';

		//$this->load->view('welcome_message', $this->data);
	}

}
