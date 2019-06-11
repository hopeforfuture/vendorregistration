<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendormodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	} 

	public function vendorinfo($cond = array())
	{
		$sql_vendor = "SELECT v.*, ct.ctype_name, c.country_name, s.StateName, tb.bank_name, vt.vtype_name    FROM vendor_info AS v JOIN company_type AS ct ON v.company_type_id = ct.ctype_id JOIN country AS c ON v.vendor_country = c.country_id JOIN state AS s ON v.state_id = s.StateID JOIN tblbankname AS tb ON v.bank_id =  tb.bankid JOIN vendor_type AS vt ON v.vendor_type_id =  vt.vtype_id ";
		
		if(count($cond) > 0)
		{
			if(array_key_exists('vendor_id', $cond))
			{
				$sql_vendor.=" WHERE v.vendor_id = ". $cond['vendor_id'];
			}
		}
		
		$query = $this->db->query($sql_vendor);
		
		return $query->row();
		
	}
	
	/* List of vendors with their uploaded quotes, invoice, payment and other details */
	public function vendorlistdetails()
	{
		$sql_vendor_list = "SELECT v.vendor_id, v.vendor_country, v.vendor_type_id, v.company_name, v.company_address, v.state_id, ";
		$sql_vendor_list.=" v.city_name, v.company_name, vf.f_id, vf.vendor_id AS new_vendor_id, vf.f_name, ";
		$sql_vendor_list.=" vf.f_status, vf.f_type, vf.paid_status, vf.f_reject_reason, vf.payment_due_date ";
		$sql_vendor_list.=" FROM vendor_info AS v LEFT JOIN vendor_files AS vf ON v.vendor_id = vf.vendor_id ";
		$sql_vendor_list.=" AND v.vendor_status = '1' AND vf.active_status = '1' ORDER BY v.vendor_id DESC, vf.f_id DESC";
		
		$query = $this->db->query($sql_vendor_list);
		
		return $query->result_array();
	}
}