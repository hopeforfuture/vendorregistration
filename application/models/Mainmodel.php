<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {
	protected $table;
	protected $old_table='';
	//protected $domain_id=1;
	function __construct()
	{
		parent::__construct();
	}
	
	/* Insert a single row in table */
	public function insert($data_array =array(),$return_id = true)
	{
		if(is_array($data_array) && sizeof($data_array)>0)
		{
			$this->db->insert($this->table,$data_array);
			if($return_id == true)
			{
				return $this->db->insert_id();
			}
		}
	}
	/* End */
	
	/* Insert multiple rows in a table */
	public function insertbatch($data = array())
	{
		if(is_array($data) && sizeof($data) > 0)
		{
			$this->db->insert_batch($this->table, $data); 
		}
	}
	/* End */
	
	
	public Function fetchOne($condition = array())
	{
		$data = array();
		if(count($condition) > 0)
		{
			$query = $this->db->get_where($this->table,$condition);
			$data = $query->row();
		}
		return $data;
	}
	public function fetchAll($fields = array(), $condition = array(), $order_by = array(), $limit = array())
	{
		$fields_list = '*';
		if(count($fields) > 0)
		{
			$fields_list = implode(",", $fields);
		}
		$this->db->select($fields_list);
		$this->db->from($this->table);
		
		if(count($condition) > 0)
		{
			$this->db->where($condition);
		}
	
		if(count($order_by) > 0)
		{
			foreach($order_by as $key => $val)
			{
				$this->db->order_by($key,$val);
			}
		}
		if(count($limit) > 0)
		{
			$this->db->limit($limit['count'],$limit['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	public function countRows($condition = array())
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		if(count($condition) > 0)
		{
			$this->db->where($condition);
		}

		$query = $this->db->get();

		return $query->num_rows();
	}
	
	public function update($data = array(),$condition = array())
	{
		if(count($data) > 0 && count($condition) > 0)
		{
			$this->db->update($this->table, $data, $condition);
		}
	}
	
	public function delete($condition = array())
	{
		if(count($condition) > 0)
		{
			$this->db->delete($this->table, $condition);
		}
	}
	
	public function setTable($table)
	{
		//$this->old_table=$this->table;
		$this->table=$table;
		return $this;
	}
	public function unsetTable()
	{
		$this->table='';
		//$this->old_table='';
		return $this;
	}
	public function sendMail($from=array(),$to=array(), $subject="", $message="", $cc=array(),$bcc=array())
	{
		$this->load->library('email');
		$config['mailtype'] = SITE_MAIL_TYPE;
		if (SITE_MAIL_CARRIER=="SMTP")
		{
			
			$config['smtp_host'] = SITE_SMTP_HOST;
			$config['smtp_user'] = SITE_SMTP_USER;
			$config['smtp_pass'] = SITE_SMTP_PASS;
			$config['smtp_port'] = SITE_SMTP_PORT;
	        
		}
		$this->email->initialize($config);
		$this->email->from($from['fromEmail'],$from['fromName']);
        $this->email->to($to);
        if(count($cc)>0)
        {
        	$this->email->cc($cc);
        }
        if(count($bcc)>0)
        {
        	$this->email->bcc($bcc);
        }
        $this->email->subject($subject);
        $this->email->message($message);

        //echo $message;
        return $this->email->send();

	}
}