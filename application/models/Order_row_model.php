<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Order_row_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'order_rows';
		parent::__construct();
	}
}