<?php
class Defaultdata extends CI_Model {

	private $data=array();
	
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function is_session_active()
	{
		$sess_id = $this->session->userdata('usrid');
		//$sess_usr_type=$this->session->userdata('usrtype');
		if (isset($sess_id)==true && $sess_id!="")
			return 1;
		else
			return 0;
	}
	public function isAdminSessionActive()
	{
		
		$sess_id = $this->session->userdata('admin_usrid');
		//$sess_usr_type=$this->session->userdata('usrtype');
		if (isset($sess_id)==true && $sess_id!="")
			return 1;
		else
			return 0;
	}
	
	
	
	/* Secure user input */
	/* start */
	public function secureInput($data)
	{
		$return_data = array();
		foreach($data as $field => $inp_data)
		{
			$return_data[$field] = $this->security->xss_clean(trim($inp_data));
		}
		return $return_data;
	}
	/* End */
	
	
	public function setLoginSession($user_data = array())
	{
		if(count($user_data) > 0)
		{
			$this->session->set_userdata('usrid',$user_data->id);
			$this->session->set_userdata('usremail',$user_data->emailAddress);
			$this->session->set_userdata('usrtype',$user_data->userType);
			$this->session->set_userdata('usrname',$user_data->userName);
			$this->session->set_userdata('usr_name',$user_data->name);
			$this->session->set_userdata('first_name',$user_data->firstName);
			$this->session->set_userdata('last_name',$user_data->lastName);
            $this->session->set_userdata('is_premium', $user_data->premium_status);
		}
	}
	public function setAdminLoginSession($user_data = array())
	{
		if(count($user_data) > 0)
		{
			$this->session->set_userdata('admin_usrid',$user_data->id);
			$this->session->set_userdata('admin_usremail',$user_data->emailAddress);
			$this->session->set_userdata('admin_usrtype',$user_data->userType);
			$this->session->set_userdata('admin_usrname',$user_data->userName);
			$this->session->set_userdata('admin_name',$user_data->name);
		}
	}
	public function unsetLoginSession()
	{
		$this->session->unset_userdata('usrid');
        $this->session->unset_userdata('is_premium');
		$this->session->unset_userdata('usremail');
		$this->session->unset_userdata('usrtype');
		$this->session->unset_userdata('usrname');
		$this->session->unset_userdata('usr_name');
		$this->session->unset_userdata('login_error');
		$this->session->unset_userdata('lastName');
		$this->session->unset_userdata('userPassword');
		$this->session->unset_userdata('emailAddress');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('last_name');
	}
	public function unsetAdminLoginSession()
	{
		$this->session->unset_userdata('admin_usrid');
		$this->session->unset_userdata('admin_usremail');
		$this->session->unset_userdata('admin_usrtype');
		$this->session->unset_userdata('admin_usrname');
		$this->session->unset_userdata('admin_name');
	}
	
	
	public function getGeneratedPassword( $length = 6 ) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $length );	
		return $password;
	}
	
}
?>