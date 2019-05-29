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
}