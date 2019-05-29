<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getStates()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}
		$statearr = array();
		$statesinfo = array();
		//$statesinfo = "[";
		$country_id = $this->input->post('country_id');

		$this->mm->setTable('state');
		$statearr = $this->mm->fetchAll(array('StateID', 'StateName'), array('CountryID'=>$country_id, 'status'=>1), array('StateName'=>'ASC'));
		$this->mm->unsetTable();

		if(count($statearr) > 0)
		{
			foreach ($statearr as $sa) 
			{
				$statesinfo[] = array(
					'id'=>$sa->StateID,
					'name'=>$sa->StateName
				);
			}
			
		}

		echo json_encode($statesinfo);
		die;
	}

	public function checkduplicate()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}
		$info = array();
		$vtype = $this->input->post('val_type');

		$this->mm->setTable('vendor_info');
		if($vtype == 'email')
		{
			$email = $this->input->post('contact_email');
			$count = $this->mm->countRows(array('contact_p_email'=>$email));
		}
		elseif($vtype == 'mob')
		{
			$mob = $this->input->post('contact_mob');
			$count = $this->mm->countRows(array('contact_p_mob'=>$mob));
		}
		$this->mm->unsetTable();

		if($count == 0)
		{
			$info['status'] = true;
		}
		else
		{
			$info['status'] = false;
		}

		echo json_encode($info);

		die;
	}

	public function updatevendorstatus()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}

		$info = array();

		$vendor_id = $this->input->post('v_id');
		$status_val = $this->input->post('newstatus');

		$record['vendor_status'] = $status_val;
		$cond['vendor_id'] = $vendor_id;

		$this->mm->setTable('vendor_info');
		$this->mm->update($record, $cond);
		$this->mm->unsetTable();

		$info['ustatus'] = true;

		echo json_encode($info);

		die;
	}

	public function updatefilestatus()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}

		$file_id = $this->input->post('file_id');
		$reject_text = $this->input->post('reject_cause');
		$file_status = $this->input->post('status');

		$fileinfo = array(
			'f_status'=>$file_status,
			'f_reject_reason'=>$reject_text
		);

		$cond = array(
			'f_id'=>$file_id
		);

		$this->mm->setTable('vendor_files');
		$this->mm->update($fileinfo, $cond);
		$this->mm->unsetTable();

		echo die;
	}

	public function updatepaidstatus()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}

		$file_id = $this->input->post('file_id');
		$due_date = $this->input->post('due_date');
		
		$due_date_arr = explode("-", $due_date);

		$due_date_timestamp =  strtotime($due_date_arr[2]."-".$due_date_arr[1]."-".$due_date_arr[0]);

		$fileinfo = array(
			'paid_status'=>'1',
			'payment_due_date'=>$due_date_timestamp
		);

		$cond = array(
			'f_id'=>$file_id
		);

		$this->mm->setTable('vendor_files');
		$this->mm->update($fileinfo, $cond);
		$this->mm->unsetTable();

		echo die;
	}
	
	public function validatepassword()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}
		$info = array();
		
		$oldpassword = md5($this->input->post('password'));
		$vendor_id = $this->session->userdata('vendor_id');
		
		$cond = array(
			'contact_p_password'=>$oldpassword,
			'vendor_id'=>$vendor_id
		);
		
		$this->mm->setTable('vendor_info');
		$count = $this->mm->countRows($cond);
		$this->mm->unsetTable();
		
		/* Password does not exists */
		if($count == 0)
		{
			$info['status'] = false;
		}
		/* End */
		else
		{
			$info['status'] = true;
		}
		
		echo json_encode($info);
		die;
	}
	
	public function checkduplicateemail()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}
		
		$info = array();
		
		$contact_email = $this->input->post('contact_email');
		$contact_id = $this->input->post('contact_id');
		
		$cond['contact_email'] = $contact_email;
		
		if($contact_id > 0)
		{
			$cond['contact_id != '] = $contact_id;
		}
		
		$this->mm->setTable('contacts');
		$count = $this->mm->countRows($cond);
		$this->mm->unsetTable();
		
		if($count == 0)
		{
			$info['status'] = true;
		}
		else
		{
			$info['status'] = false;
		}
		
		echo json_encode($info);
		die;
			
	}
	
	/* Forgot password section*/
	/* Done by manojit on 21-05-2019*/
	public function forgotpassword()
	{
		if (!$this->input->is_ajax_request()) 
		{
   			exit('No direct script access allowed');
		}
		$inputdata = $this->input->post('credential');
		
		$phone_pattern = array(
			'/\+[0-9]{2}+[0-9]{10}/s',
			'/[0-9]{10}/s',
			
		);
		
		$info = array();
		$cond = array();
		$input_type = '';
		
		if (filter_var($inputdata, FILTER_VALIDATE_EMAIL))
		{
			$cond = array(
				'contact_p_email' => $inputdata
			);
			
			$input_type = 'email';
		}
		else
		{
			foreach($phone_pattern as $pattern)
			{
				if(preg_match($pattern, $inputdata))
				{
					$cond = array(
						'contact_p_mob' => $inputdata
					);
					
					$input_type = 'mobile';
					
					break;
				}
			}
		}
		
		if(empty($cond))
		{
			$info['status'] = false;
			$info['msg'] = 'Please enter either a valid email or a mobile no.';
		}
		
		else
		{
			$this->mm->setTable('vendor_info');
			$vendorinfo = $this->mm->fetchOne($cond);
			$this->mm->unsetTable();
			
			if(empty($vendorinfo))
			{
				$info['status'] = false;
				if($input_type == 'email')
				{
					$info['msg'] = 'Email does not exists';
				}
				elseif($input_type == 'mobile')
				{
					$info['msg'] = 'Mobile no. does not exists';
				}
				
			}
			else
			{
				$cond = array();
				
				if($vendorinfo->vendor_status == 0)
				{
					$info['status'] = false;
					$info['msg'] = 'User does not exists';
				}
				
				else
				{
					$otp = rand(1000, 9999);
					$this->session->set_userdata('otp', $otp);
					$this->session->set_userdata('vendor_data_id', $vendorinfo->vendor_id);
					
					if($input_type == 'email')
					{
						$subject = "OTP Details";
						$body = "Dear user,<br/>Thank you for your interest. Your OTP is below:<br/><br/>"." OTP: <b>".$otp."</b><br/><br/>Thanks again. <br/>The express group.";

						$this->email->from('no-reply@expressgrp.com', 'Express Group');
						$this->email->to($inputdata);
						$this->email->set_mailtype("html");
						$this->email->subject($subject);
						$this->email->message($body);
						$this->email->send();
						
						$info['status'] = true;
						$info['msg'] = 'done';
						
					}
					else
					{
						$mob_no=ltrim($inputdata, "+");
						
						$username = 'bablu.d@expressgrp.com';
						$hash = 'c3d0720ee946988ca20cd59fbe75433285a23c03'   ;
						$unicode = 0;
						
						$message = "Dear User,
Your verification code is ".$otp.". Please Enter this code to confirm your Mobile No. TnC apply.
- FarmNeed.";
						
						$numbers = $mob_no;
						$sender = urlencode('FARMND');
						$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message, "unicode" =>$unicode );

						// Send the POST request with cURL
						$ch = curl_init('http://api.textlocal.in/send/');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						$json_dval=json_decode($response);
						$return = $json_dval->status;
						
						
						
						if($return == 'success')
						{
							$info['status'] = true;
							$info['msg'] = 'Done';
							
						}
						else
						{
							$info['status'] = false;
							$info['msg'] = 'Error in sending msg';
						}
						
					}
				}
			}
		}
		
		echo json_encode($info);
		
		die;
	}
	/* End */
	
	/* Verify OTP section */
	/* Done by manojit nandi on 21-05-2019 */
	public function verifyotp()
	{
		$verification_code = $this->input->post('code');
		$info = array();
		$sessiondata = $this->session->userdata();
		
		if($sessiondata['otp'] == $verification_code)
		{
			$info['status'] = true;
			$info['msg'] = 'Done';
		}
		else
		{
			$info['status'] = false;
			$info['msg'] = 'verification code does not match';
		}
		
		echo json_encode($info);
		die;
	}
	/* End */
}