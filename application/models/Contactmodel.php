<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function fetchallvendors($contact_id = '')
	{
		$sql = "SELECT vendor_info.vendor_id, vendor_info.company_name, vendor_contacts.vendor_id AS contactvendor FROM vendor_info LEFT JOIN vendor_contacts ON vendor_info.vendor_id = vendor_contacts.vendor_id WHERE vendor_info.vendor_status = '1'  and (vendor_contacts.contact_id= ".$contact_id." or vendor_contacts.contact_id is null)  ORDER BY vendor_info.vendor_id DESC";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function fetchcontactinfo($vendor_id = '')
	{
		$sql = "SELECT contacts.contact_name, contacts.contact_email, contacts.contact_phone FROM contacts JOIN vendor_contacts ON contacts.contact_id = vendor_contacts.contact_id WHERE  ";
		$sql.=" vendor_contacts.vendor_id = ".$vendor_id;
		
		$query = $this->db->query($sql);
		return $query->row();
	}
}