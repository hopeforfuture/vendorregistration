<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoicemodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	} 

	public function fetchallfiles($cond = array(), $order_by = array())
	{
		$this->db->select('*');
		$this->db->from('vendor_files');
		$this->db->join('vendor_info', 'vendor_files.vendor_id = vendor_info.vendor_id');
		if(count($cond) > 0)
		{
			$this->db->where($cond);
		}
		if(count($order_by) > 0)
		{
			$this->db->order_by($order_by['field'], $order_by['type']);
		}
		$query = $this->db->get();

		return $query->result();

	}
}