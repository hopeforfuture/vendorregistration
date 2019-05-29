<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('invoicemodel'=>'inv'));
		$this->load->model('contactmodel');
		$this->load->library('upload');
		$action = '';
		$segment = '';
		$step = '';

		if($this->uri->segment(1))
		{
			$action = $this->uri->segment(1);
		}

		if($this->uri->segment(2))
		{
			$segment = $this->uri->segment(2);
		}

		if($this->uri->segment(3))
		{
			$step = $this->uri->segment(3);
		}

		
		switch($action)
		{

			case '':
				$this->data['title'] = 'Vendor Login';
			break;

			case 'login':
				$this->data['title'] = 'Vendor Login';
			break;
			
			case 'forgotpassword':
				$this->data['title'] = 'Fotgot Password';
			break;

			case 'create':
				$step = 1;
				$this->data['title'] = 'Vendor Registration - Step 1';
			break;

			case 'vendordashboard':
				$this->data['title'] = 'Vendor Dashboard';
			break;

		}


		switch($step)
		{
			case 1:
				$this->data['title'] = 'Vendor Registration - Step 1';
			break;

			case 2:
				$this->data['title'] = 'Vendor Registration - Step 2';
			break;

			case 3:
				$this->data['title'] = 'Vendor Registration - Step 3';
			break;

			case 4:
				$this->data['title'] = 'Vendor Registration - Step 4';
			break;

		}

		$this->data['step'] = $step;

		if($this->session->has_userdata('vendor_id'))
		{
			$sessiondata = $this->session->userdata();
			$this->data['sessdata'] = $sessiondata;
			
			$contactinfo = (array)$this->contactmodel->fetchcontactinfo($this->session->userdata('vendor_id'));
			if(empty($contactinfo))
			{
				$contactinfo = array(
					'contact_name'=>'',
					'contact_email'=>'',
					'contact_phone'=>''
				);
			}
		
			$this->data['contactinfo'] = $contactinfo;
			
			$this->data['header'] = $this->load->view('templates/frontend/header_after_login', $this->data, true);
		}
		else
		{
			$this->data['header'] = $this->load->view('templates/frontend/header', $this->data, true);
		}
		if(!$this->session->has_userdata('vendor_id'))
		{
			$this->data['footer'] = $this->load->view('templates/frontend/footer', '', true);
		}
		else
		{
			$this->data['footer'] = $this->load->view('templates/frontend/footer_after_login', '', true);
		}
		
	}


	/* vendor login functionality */
	public function index()
	{
		/* If already logged in redirect to dahboard*/
		if($this->session->has_userdata('vendor_id'))
		{
			redirect(base_url('vendordashboard'));
		}
		/* End */

		if(!empty($this->input->post()))
		{
			$postdata = $this->input->post();
			$logininfo = array();
			$cond = array();
			$username = trim($postdata['loginname']);

			if(filter_var($username,FILTER_VALIDATE_EMAIL))
			{
				$cond['contact_p_email'] = $username;
			}
			else
			{
				$cond['contact_p_mob'] = $username;
			}

			$cond['contact_p_password'] = md5($postdata['loginpassword']);
			$cond['vendor_status'] = 1;

			$this->mm->setTable('vendor_info');
			$logininfo = (array)$this->mm->fetchOne($cond);
			$this->mm->unsetTable();

			if(empty($logininfo))
			{
				$this->data['login_msg'] = 'Wrong username or password';
				$this->data['loginname'] = $postdata['loginname'];
			}

			else
			{
				$this->session->set_userdata($logininfo);
				redirect(base_url('vendordashboard'));
			}
		}
		$this->load->view('user/index', $this->data);
	}
	/* End */
	
	/* Forgot password section */
	/* Done by manojit nandi on 21-05-2019 */
	public function forgotpassword()
	{
		/* If already logged in redirect to dahboard*/
		if($this->session->has_userdata('vendor_id'))
		{
			redirect(base_url('vendordashboard'));
		}
		/* End */
		
		if(!empty($this->input->post()))
		{
			$postdata = $this->input->post();
			
			$cond = array();
			
			if(array_key_exists('loginname', $postdata))
			{
				unset($postdata['loginname']);
			}
			if(array_key_exists('txtOtp', $postdata))
			{
				unset($postdata['txtOtp']);
			}
			if(array_key_exists('txtconfPassword', $postdata))
			{
				unset($postdata['txtconfPassword']);
			}
			
			$passwordinfo = $this->dfd->secureInput($postdata);
			
			$sessiondata = $this->session->userdata();
			
			$vendorpasswordinfo = array(
				'contact_p_password' => md5($passwordinfo['txtPassword'])
			);
			
			$cond = array(
				'vendor_id'=>$sessiondata['vendor_data_id']
			);
			
			$this->mm->setTable('vendor_info');
			$this->mm->update($vendorpasswordinfo, $cond);
			$this->mm->unsetTable();
			
			$sessionkeys = array_keys($sessiondata);
			$this->session->unset_userdata($sessionkeys);
			$this->session->set_flashdata('msg', 'Password reset successfully.');
			
			redirect(base_url());
		}
		
		$this->load->view('user/forgotpassword', $this->data);
	}
	/* End */


	public function dashboard($f_type = 'I')
	{
		/* If not logged in redirect to login page*/
		if(!$this->session->has_userdata('vendor_id'))
		{
			redirect(base_url());
		}
		/* End */
		
		$cond['vendor_files.f_type'] = $f_type;
		$cond['vendor_files.active_status'] = 1;
		$cond['vendor_info.vendor_id'] = $this->session->userdata('vendor_id');
		$order_by['field'] = 'vendor_files.f_id';
		$order_by['type'] = 'DESC';

		$this->data['files'] = $this->inv->fetchallfiles($cond, $order_by);
		$this->data['type'] = $f_type;
		$this->load->view('user/dashboard', $this->data);

	}


	/* Vendor logout functionality */
	public function logout()
	{
		if($this->session->has_userdata('vendor_id'))
		{
			$sessiondata = $this->session->userdata();
			$sessiondatakeys = array_keys($sessiondata);
			$this->session->unset_userdata($sessiondatakeys);
			redirect(base_url());
		}
		redirect(base_url());
	}
	/* End */

	/* Change Password section*/
	public function updatepassword()
	{
		/* If not logged in redirect to login page*/
		if(!$this->session->has_userdata('vendor_id'))
		{
			redirect(base_url());
		}
		/* End */
		
		if(!empty($this->input->post()))
		{
			$postdata = $this->input->post();
			$vendordata = $this->dfd->secureInput($postdata);
			$vendordata['contact_p_password'] = md5($vendordata['contact_p_password']);
			$cond = array(
				'vendor_id'=>$this->session->userdata('vendor_id')
			);
			
			$this->mm->setTable('vendor_info');
			$this->mm->update($vendordata, $cond);
			$this->mm->unsetTable();
			
			$this->session->set_flashdata('msg', 'Password changed successfully.');
			redirect(base_url('changepassword'));
		}

		$this->load->view('user/change_password', $this->data);


	}
	/* End */


	public function pagenotfound()
	{
		/*echo "<pre>";
		print_r($this->session->userdata());
		echo "</pre>";
		$this->load->view('cms/notfound');*/
	}

	public function createvendor($step = 1, $vendor_id = 0)
	{
		if($this->session->has_userdata('vendor_id'))
		{
			redirect(base_url('vendordashboard'));
		}

		if($step > 4)
		{
			redirect(base_url('vendor/create/1/0'));
		}

		$com_step = 0;
		$redirect_url = '';
		if($this->session->has_userdata('com_step'))
		{
			$com_step = $this->session->userdata('com_step');
		}
		$this->data['vendor_id'] = $vendor_id;
		$diff = $step-$com_step;

		switch($step)
		{
			case 1:
				$this->mm->setTable('country');
				$this->data['countrylist'] = $this->mm->fetchAll(array('country_id', 'country_name'), array('country_status' => 1), array('country_id' => 'ASC'));
				$this->mm->unsetTable();

				$this->mm->setTable('vendor_type');
				$this->data['vendors'] = $this->mm->fetchAll(array('vtype_id', 'vtype_name'), array('vtype_status' => 1), array('vtype_id' => 'ASC'));
				$this->mm->unsetTable();

				if($vendor_id == 0)
				{
					if($this->session->has_userdata('vendor_country'))
					{
						$vendor_country = $this->session->userdata('vendor_country');
					}
					else
					{
						$vendor_country = '';
					}
					if($this->session->has_userdata('vendor_type_id'))
					{
						$vendor_type_id = $this->session->userdata('vendor_type_id');
					}
					else
					{
						$vendor_type_id = '';
					}

					$this->data['vendor_country'] = $vendor_country;
					$this->data['vendor_type_id'] = $vendor_type_id;

				}
				else
				{
					$this->data['vendor_country'] = '';
					$this->data['vendor_type_id'] = '';
				}

				$this->load->view('user/create_step_one', $this->data);	
			break;

			case 2:
				if($com_step == 0)
				{
					$back_step = 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}
				/*elseif($diff > 1)
				{
					$back_step = $com_step + 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}*/
				elseif(($diff == 1) || ($step <= $com_step))
				{
					$this->mm->setTable('company_type');
					$this->data['companytypelist'] = $this->mm->fetchAll(array('ctype_id', 'ctype_name'), array('ctype_status' => 1), array('ctype_name' => 'DESC'));
					$this->mm->unsetTable();

					$country_id = $this->session->userdata('vendor_country');

					$this->mm->setTable('state');
					$this->data['statelist'] = $this->mm->fetchAll(array('StateID', 'StateName'), array('CountryID'=>$country_id, 'status'=>1), array('Statename'=>'ASC'));
					$this->mm->unsetTable();

					if($vendor_id == 0)
					{
						if($this->session->has_userdata('company_name'))
						{
							$company_name = $this->session->userdata('company_name');
						}
						else
						{
							$company_name = '';
						}

						if($this->session->has_userdata('company_type_id'))
						{
							$company_type_id = $this->session->userdata('company_type_id');
						}
						else
						{
							$company_type_id = '';
						}

						if($this->session->has_userdata('company_address'))
						{
							$company_address = $this->session->userdata('company_address');
						}
						else
						{
							$company_address = '';
						}

						if($this->session->has_userdata('state_id'))
						{
							$state_id = $this->session->userdata('state_id');
						}
						else
						{
							$state_id = '';
						}

						if($this->session->has_userdata('city_name'))
						{
							$city_name = $this->session->userdata('city_name');
						}
						else
						{
							$city_name = '';
						}

						if($this->session->has_userdata('company_pin'))
						{
							$company_pin = $this->session->userdata('company_pin');
						}
						else
						{
							$company_pin = '';
						}

						if($this->session->has_userdata('company_tel1'))
						{
							$company_tel1 = $this->session->userdata('company_tel1');
						}
						else
						{
							$company_tel1 = '';
						}

						if($this->session->has_userdata('company_tel2'))
						{
							$company_tel2 = $this->session->userdata('company_tel2');
						}
						else
						{
							$company_tel2 = '';
						}

						if($this->session->has_userdata('company_url'))
						{
							$company_url = $this->session->userdata('company_url');
						}
						else
						{
							$company_url = '';
						}

						if($this->session->has_userdata('contact_p_name'))
						{
							$contact_p_name = $this->session->userdata('contact_p_name');
						}
						else
						{
							$contact_p_name = '';
						}

						if($this->session->has_userdata('contact_p_post'))
						{
							$contact_p_post = $this->session->userdata('contact_p_post');
						}
						else
						{
							$contact_p_post = '';
						}

						if($this->session->has_userdata('contact_p_mob'))
						{
							$contact_p_mob = $this->session->userdata('contact_p_mob');
						}
						else
						{
							$contact_p_mob = '';
						}

						if($this->session->has_userdata('contact_p_email'))
						{
							$contact_p_email = $this->session->userdata('contact_p_email');
						}
						else
						{
							$contact_p_email = '';
						}

						$this->data['company_name'] = $company_name;
						$this->data['company_type_id'] = $company_type_id;
						$this->data['company_address'] = $company_address;
						$this->data['state_id'] = $state_id;
						$this->data['city_name'] = $city_name;
						$this->data['company_pin'] = $company_pin;
						$this->data['company_tel1'] = $company_tel1;
						$this->data['company_tel2'] = $company_tel2;
						$this->data['company_url'] = $company_url;
						$this->data['contact_p_name'] = $contact_p_name;
						$this->data['contact_p_post'] = $contact_p_post;
						$this->data['contact_p_mob'] = $contact_p_mob;
						$this->data['contact_p_email'] = $contact_p_email;
						
					}
				}

				if(!empty($redirect_url))
				{
					redirect($redirect_url);
				}

				$this->load->view('user/create_step_two', $this->data);	
			break;

			case 3:
				if($com_step == 0)
				{
					$back_step = 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}
				elseif($diff > 1)
				{
					$back_step = $com_step + 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}
				elseif(($diff == 1) || ($step <= $com_step))
				{
					$this->mm->setTable('tblbankname');
					$this->data['banklist'] = $this->mm->fetchAll(array(), array('bank_status' => 1), array('bank_name' => 'ASC'));
					$this->mm->unsetTable();

					if($this->session->has_userdata('pan_info'))
					{
						$pan_info = $this->session->userdata('pan_info');
					}
					else
					{
						$pan_info = '';
					}

					if($this->session->has_userdata('gst_info'))
					{
						$gst_info = $this->session->userdata('gst_info');
					}
					else
					{
						$gst_info = '';
					}

					if($this->session->has_userdata('bank_id'))
					{
						$bank_id = $this->session->userdata('bank_id');
					}
					else
					{
						$bank_id = '';
					}

					if($this->session->has_userdata('branch_name'))
					{
						$branch_name = $this->session->userdata('branch_name');
					}
					else
					{
						$branch_name = '';
					}


					if($this->session->has_userdata('acc_no'))
					{
						$acc_no = $this->session->userdata('acc_no');
					}
					else
					{
						$acc_no = '';
					}

					if($this->session->has_userdata('ifsc_code'))
					{
						$ifsc_code = $this->session->userdata('ifsc_code');
					}
					else
					{
						$ifsc_code = '';
					}

					if($this->session->has_userdata('acc_type'))
					{
						$acc_type = $this->session->userdata('acc_type');
					}
					else
					{
						$acc_type = '';
					}


					$this->data['pan_info'] = $pan_info;
					$this->data['gst_info'] = $gst_info;
					$this->data['bank_id'] = $bank_id;
					$this->data['branch_name'] = $branch_name;
					$this->data['acc_no'] = $acc_no;
					$this->data['ifsc_code'] = $ifsc_code;
					$this->data['pan_info'] = $pan_info;
					$this->data['acc_type'] = $acc_type;

				}

				if(!empty($redirect_url))
				{
					redirect($redirect_url);
				}

				$this->load->view('user/create_step_three', $this->data);	
				
			break;

			case 4:
				if($com_step == 0)
				{
					$back_step = 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}
				elseif($diff > 1)
				{
					$back_step = $com_step + 1;
					$redirect_url = base_url('vendor/create/'.$back_step.'/'.$vendor_id);
				}
				elseif(($diff == 1))
				{
					$this->data['company_type_id'] = $this->session->userdata('company_type_id');
				}
				
				if(!empty($redirect_url))
				{
					redirect($redirect_url);
				}
				$this->load->view('user/create_step_four', $this->data);
			break;



			default:
				$this->load->view('user/create_step_one', $this->data);	

		}
		
	}

	/* Get Uploaded file name and extension */
	public function uploadfileinfo($filename = '')
	{
		$filedata = array();

		if(!empty($filename))
		{
			$filearr = pathinfo($filename);

			$filedata = array(
				'ext'=>strtolower($filearr['extension']),
				'filename'=>str_replace(' ', '_', $filearr['filename'])
			);
		}

		return $filedata;
	}
	/* End */

	public function createvendorprocess($step = 1, $vendor_id = 0)
	{
		if(empty($this->input->post()))
		{
			redirect(base_url('vendor/create/1/0'));
		}

		$postdata = $this->input->post();
		
		switch($step)
		{
			case 1:
				$processdata = $this->dfd->secureInput($postdata);
				$this->session->set_userdata($processdata);
				$this->session->set_userdata('com_step', $step);
				$next_step = $step + 1;
				$redirect_url = base_url('vendor/create/'.$next_step.'/'.$vendor_id);
			break;

			case 2:
				$processdata = $this->dfd->secureInput($postdata);
				$this->session->set_userdata($processdata);
				$this->session->set_userdata('com_step', $step);
				$next_step = $step + 1;
				$redirect_url = base_url('vendor/create/'.$next_step.'/'.$vendor_id);
			break;

			case 3:
				$processdata = $this->dfd->secureInput($postdata);
				$this->session->set_userdata($processdata);
				$this->session->set_userdata('com_step', $step);
				$next_step = $step + 1;
				$redirect_url = base_url('vendor/create/'.$next_step.'/'.$vendor_id);
			break;

			case 4:
				if(empty($_FILES))
				{
					redirect(base_url('vendor/create/1/0'));
				}
				$config_trade = array();
				$config_cert = array();
				$config_pan = array();
				$config_gst = array();
				$config_cancelled = array();

				$company_type_id = $this->input->post('company_type_id');
				$trade_file = '';
				$cert_file = '';
				$pan_file = '';
				$gst_file = '';
				$cancelled_cheque_file = '';

				$trade_new = '';
				$cert_new = '';
				$pan_new = '';
				$gst_new = '';
				$cancelled_new = '';

				if(($company_type_id == 1) || ($company_type_id == 3))
				{
					$trade_file = $_FILES['trade_file']['name'];
					$pan_file = $_FILES['pan_file']['name'];
					$gst_file = $_FILES['gst_file']['name'];
					$cancelled_cheque_file = $_FILES['cancelled_cheque_file']['name'];

					$trade_info = $this->uploadfileinfo($trade_file);
					$pan_info = $this->uploadfileinfo($pan_file);
					$gst_info = $this->uploadfileinfo($gst_file);
					$cancelled_info = $this->uploadfileinfo($cancelled_cheque_file);


					$trade_new = rand(1000, 1000000)."_".$trade_info['filename'].".".$trade_info['ext'];
					$pan_new = rand(1000, 1000000)."_".$pan_info['filename'].".".$pan_info['ext'];
					$gst_new = rand(1000, 1000000)."_".$gst_info['filename'].".".$gst_info['ext'];
					$cancelled_new = rand(1000, 1000000)."_".$cancelled_info['filename'].".".$cancelled_info['ext'];
					
					$config_trade['upload_path'] = './uploads/';
					$config_trade['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_trade['file_name'] = $trade_new;

					$this->upload->initialize( $config_trade);

					if($this->upload->do_upload('trade_file'))
					{
						$this->session->set_userdata('trade_file', $trade_new);
					}

					$config_pan['upload_path'] = './uploads/';
					$config_pan['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_pan['file_name'] = $pan_new;

					$this->upload->initialize( $config_pan);

					if($this->upload->do_upload('pan_file'))
					{
						$this->session->set_userdata('pan_file', $pan_new);
					}

					$config_gst['upload_path'] = './uploads/';
					$config_gst['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_gst['file_name'] = $gst_new;

					$this->upload->initialize( $config_gst);

					if($this->upload->do_upload('gst_file'))
					{
						$this->session->set_userdata('gst_file', $gst_new);
					}

					$config_cancelled['upload_path'] = './uploads/';
					$config_cancelled['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_cancelled['file_name'] = $cancelled_new;

					$this->upload->initialize( $config_cancelled);

					if($this->upload->do_upload('cancelled_cheque_file'))
					{
						$this->session->set_userdata('cancelled_cheque_file', $cancelled_new);
					}

				}

				elseif($company_type_id == 2)
				{
					$trade_file = $_FILES['trade_file']['name'];
					$cert_file = $_FILES['cert_file']['name'];
					$pan_file = $_FILES['pan_file']['name'];
					$gst_file = $_FILES['gst_file']['name'];
					$cancelled_cheque_file = $_FILES['cancelled_cheque_file']['name'];

					$trade_info = $this->uploadfileinfo($trade_file);
					$cert_info = $this->uploadfileinfo($cert_file);
					$pan_info = $this->uploadfileinfo($pan_file);
					$gst_info = $this->uploadfileinfo($gst_file);
					$cancelled_info = $this->uploadfileinfo($cancelled_cheque_file);

					if(strlen($trade_file) > 0)
					{
						$trade_new = rand(1000, 1000000)."_".$trade_info['filename'].".".$trade_info['ext'];
					}
					
					$cert_new = rand(1000, 1000000)."_".$cert_info['filename'].".".$cert_info['ext'];
					$pan_new = rand(1000, 1000000)."_".$pan_info['filename'].".".$pan_info['ext'];
					$gst_new = rand(1000, 1000000)."_".$gst_info['filename'].".".$gst_info['ext'];
					$cancelled_new = rand(1000, 1000000)."_".$cancelled_info['filename'].".".$cancelled_info['ext'];

					if(strlen($trade_file) > 0)
					{
						$config_trade['upload_path'] = './uploads/';
						$config_trade['allowed_types'] = 'jpg|png|jpeg|pdf';
						$config_trade['file_name'] = $trade_new;

						$this->upload->initialize( $config_trade);

						if($this->upload->do_upload('trade_file'))
						{
							$this->session->set_userdata('trade_file', $trade_new);
						}
					}

					$config_cert['upload_path'] = './uploads/';
					$config_cert['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_cert['file_name'] = $cert_new;

					$this->upload->initialize( $config_cert);

					if($this->upload->do_upload('cert_file'))
					{
						$this->session->set_userdata('cert_file', $cert_new);
					}


					$config_pan['upload_path'] = './uploads/';
					$config_pan['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_pan['file_name'] = $pan_new;

					$this->upload->initialize( $config_pan);

					if($this->upload->do_upload('pan_file'))
					{
						$this->session->set_userdata('pan_file', $pan_new);
					}

					$config_gst['upload_path'] = './uploads/';
					$config_gst['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_gst['file_name'] = $gst_new;

					$this->upload->initialize( $config_gst);

					if($this->upload->do_upload('gst_file'))
					{
						$this->session->set_userdata('gst_file', $gst_new);
					}

					$config_cancelled['upload_path'] = './uploads/';
					$config_cancelled['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config_cancelled['file_name'] = $cancelled_new;

					$this->upload->initialize( $config_cancelled);

					if($this->upload->do_upload('cancelled_cheque_file'))
					{
						$this->session->set_userdata('cancelled_cheque_file', $cancelled_new);
					}
				}
				
				$vendorinfodata = $this->session->userdata();

				if(array_key_exists('__ci_last_regenerate', $vendorinfodata))
				{
					unset($vendorinfodata['__ci_last_regenerate']);
				}

				if(array_key_exists('com_step', $vendorinfodata))
				{
					unset($vendorinfodata['com_step']);
				}
				$generate_pswd = $this->dfd->getGeneratedPassword();
				$vendorinfodata['contact_p_password'] = md5($generate_pswd);
				$vendorinfodata['created_at'] = time();

				$this->mm->setTable('vendor_info');
				$this->mm->insert($vendorinfodata);
				$this->mm->unsetTable();

				$vendorkeys = array_keys($vendorinfodata);

				$body_email = "Dear user,<br/>Thank you for your interest. Your login credential is below:<br/><br/>User Id: <b>".$this->session->userdata('contact_p_email')."</b> <br/> Password: <b>".$generate_pswd."</b><br/><br/>Thanks again. <br/>The express group.";


				$this->email->from('no-reply@expressgrp.com', 'Express Group');
				$this->email->to($this->session->userdata('contact_p_email'));
				$this->email->set_mailtype("html");
				$this->email->subject('Registration Successful');
				$this->email->message($body_email);

				$this->email->send();


				$this->session->unset_userdata($vendorkeys);
				$this->session->unset_userdata('com_step');

				$this->session->set_flashdata('msg', 'Vendor Created successfully.');
				
                //redirect(base_url('vendor/create/1/0'));

                $redirect_url = base_url('vendor/create/1/0');
			break;
		}
		
		redirect($redirect_url);
	}

	public function uploadinvoicequotation($ftype = 'I')
	{
		if(!$this->session->has_userdata('vendor_id'))
		{
			redirect(base_url());
		}
		if(empty($_FILES))
		{
			base_url('vendordashboard');
		}
		$config = array();
		$count = count($_FILES['files']['name']);
		$uploadcount = 0;

		for($i = 0; $i < $count; $i++)
		{
			$_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];


            // File upload configuration
            $uploadPath = './uploads/';

           	if(!empty($_FILES['file']['name']))
           	{
           		$fileinfo = $this->uploadfileinfo($_FILES['file']['name']);
           		$new_filename = rand(10000, 1000000000)."_".$fileinfo['filename'].".".$fileinfo['ext'];
           		$config['upload_path'] = $uploadPath;
            	$config['allowed_types'] = 'jpg|jpeg|png|pdf';
            	$config['file_name'] = $new_filename;

            	$this->upload->initialize($config);

            	if($ftype == 'Q')
            	{
            		$paid_status = 'NA';
            	}
            	else
            	{
            		$paid_status = '0';
            	}

            	$vendorfiledata = array(
            		'vendor_id'=>$this->session->userdata('vendor_id'),
            		'f_name' => $new_filename,
            		'f_type'=>$ftype,
            		'paid_status'=>$paid_status,
            		'created_at'=>time()
            	);

            	if($this->upload->do_upload('file'))
            	{
            		$this->mm->setTable('vendor_files');
            		$this->mm->insert($vendorfiledata);
            		$this->mm->unsetTable();
            		$uploadcount++;
            	}
           	}


           	$config = array();
            
		}

		if($uploadcount > 0)
		{
			$msg = $uploadcount." file(s) uploaded successfully.";
		}
		else
		{
			$msg = "No file uploaded successfully.";
		}

		$this->session->set_flashdata('msg', $msg);

		$redirecturl = '';

		if($ftype == 'I')
		{
			$redirecturl = base_url('vendordashboard/I');
		}
		elseif($ftype == 'Q')
		{
			$redirecturl = base_url('vendordashboard/Q');
		}

		redirect($redirecturl);
	}
}
