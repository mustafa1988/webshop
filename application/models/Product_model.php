<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'products';
		parent::__construct();
	}
}