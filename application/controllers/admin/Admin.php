<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/dompdf/lib/html5lib/Parser.php';
include APPPATH . 'third_party/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		
		$this->load->model(array('invoicemodel'=>'inv'));
		$this->load->model('contactmodel');
		$this->load->model('vendormodel');
		
		$title = 'Administrator Login';

		$segment_arr =  $this->uri->segment_array();
		$segment_count = count($segment_arr);
		$seg_name = '';
		
	
		/* When page is loaded for first time */
		if($segment_count == 1)
		{
			$title = 'Administrator Login';
		}
		else
		{
			$seg_name = $segment_arr[2];
			if($seg_name == 'dashboard')
			{
				$title = 'Administrator Dashboard';
			}
		}

		$this->data['title'] = $title;

		if($this->session->has_userdata('u_id'))
		{
			$seesiondata = $this->session->userdata();
			if(array_key_exists('last_login', $seesiondata))
			{
				$seesiondata['last_login'] = date('F j, Y, g:i a', $seesiondata['last_login']);
			}
			
			/* Total no of vendors */
			$cond = array('vendor_status'=>'1');
			$this->mm->setTable('vendor_info');
			$this->data['count_vendors'] = $this->mm->countRows($cond);
			$this->mm->unsetTable();
			
			$cond = array();
			/* Total no of pending quotes */
			$cond = array('f_type'=>'Q', 'f_status'=>'P', 'active_status'=>'1');
			$this->mm->setTable('vendor_files');
			$this->data['count_p_quotes'] = $this->mm->countRows($cond);
			$this->mm->unsetTable();
			
			$cond = array();
			
			/* Total no pending payment */
			$cond = array('f_type'=>'I', 'paid_status'=>'0', 'active_status'=>'1');
			$this->mm->setTable('vendor_files');
			$this->data['pending_payment'] = $this->mm->countRows($cond);
			$this->mm->unsetTable();
			
			$cond = array();
			/* Total no of pending invoice */
			$cond = array('f_type'=>'I', 'f_status'=>'P', 'active_status'=>'1');
			$this->mm->setTable('vendor_files');
			$this->data['count_p_invoice'] = $this->mm->countRows($cond);
			$this->mm->unsetTable();
			
			$this->data['sessdata'] = $seesiondata;
			$this->data['header'] = $this->load->view('templates/admin/header', $this->data, true);
			$this->data['footer'] = $this->load->view('templates/admin/footer', '', true);
		}
		else
		{
			$this->data['header'] = $this->load->view('templates/admin/header_before_login', $this->data, true);
			$this->data['footer'] = $this->load->view('templates/admin/footer_before_login', '', true);	
		}
		
	}

	public function login()
	{
		/* If already logged in then redirect to dashboard */
		if($this->session->has_userdata('u_id'))
		{
			redirect(base_url('admin/dashboard'));
		}

		if(!empty($this->input->post()))
		{
			$postdata = $this->input->post();
			$cond['u_email'] = trim($postdata['u_email']);
			$cond['u_pswd'] = md5($postdata['u_pswd']);
			//Only admin will be allowed
			$cond['u_type'] = 1;
			//Only for active user
			$cond['u_status'] = 1;

			$this->mm->setTable('users');
			$logininfo = (array)$this->mm->fetchOne($cond);
			$this->mm->unsetTable();

			if(empty($logininfo))
			{
				$this->data['login_msg'] = 'Wrong username or password';
				$this->data['loginname'] = $postdata['u_email'];
			}
			else
			{
				$cond = array();
				/* Update last login time*/
				$udata['last_login'] = time(); 
				$cond['u_id'] = $logininfo['u_id'];
				$this->mm->setTable('users');
				$this->mm->update($udata, $cond);
				$this->mm->unsetTable();
				$logininfo['last_login'] = $udata['last_login'];
				/* End */
				$this->session->set_userdata($logininfo);
				redirect(base_url('admin/dashboard'));
			}
		}
		$this->load->view('admin/login', $this->data);
	}


	public function dashboard()
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		$venddata = array();
		$invdata = array();
		$quotesdata = array();
		$paymentdata = array();
		$vendor_keys = array();
		$vendor_names = array();
		$quote_count = 1;
		$inv_count = 1;
		$payment_count = 1;
		$vendor_id = '';
		//$vendcount = 0;
		
		$vendorfiles = $this->vendormodel->vendorlistdetails();
		
		if(!empty($vendorfiles))
		{
			$vendor_keys = array_column($vendorfiles, 'vendor_id');
			$vendor_key_unique = array_unique($vendor_keys);
			$vendor_names = array_column($vendorfiles, 'company_name');
			$vendor_id = current($vendor_key_unique);
			
			foreach($vendorfiles as $vef)
			{
				
					if($vendor_id != $vef['vendor_id'])
					{
						$inv_count = 1;
						$payment_count = 1;
						$quote_count = 1;
						$vendor_id = next($vendor_key_unique);
					}
					
					$venddata[$vendor_id] = array(
						'name' => ucwords($vef['company_name']),
						//'id'   => $vef['vendor_id']
					);
					
					
					
					switch($vef['f_type'])
					{
						case 'I':
						
						 if($vendor_id == $vef['vendor_id'])
						 {
							if($vef['paid_status'] == 0)
							{
								$invdata[$vendor_id][] = (
									array(
										'si_no' => $inv_count,
										'fileno' => $vef['f_id'],
										'vendor_id' => $vef['vendor_id'],
										'type'  => $vef['f_type'],
										'inv_status' => $vef['f_status'],
										'paid' => $vef['paid_status'],
										'reject_reason' => $vef['f_reject_reason'],
										'duedate' => $vef['payment_due_date'],
										'created' => $vef['created_at']
									)
								);
								
								$inv_count++;
							}
							elseif($vef['paid_status'] == 1)
							{
								$paymentdata[$vendor_id][] = (
									array(
										'si_no' => $payment_count,
										'fileno' => $vef['f_id'],
										'inv_status' => $vef['f_status'],
										'vendor_id' => $vef['vendor_id'],
										'type'  => $vef['f_type'],
										'paid' => $vef['paid_status'],
										'created' => $vef['created_at']
									)
								);
								
								$payment_count++;
							}
						 }
						break;
						
						case 'Q':
							$quotesdata[$vendor_id][] = (
									array(
										'si_no' => $quote_count,
										'fileno' => $vef['f_id'],
										'vendor_id' => $vef['vendor_id'],
										'type'  => $vef['f_type'],
										'quote_status' => $vef['f_status'],
										'reject_reason' => $vef['f_reject_reason'],
										'created' => $vef['created_at']
									)
							);
								
								$quote_count++;
						break;
						
						
					}
				}
			
		}
		
		$this->data['venddata'] = $venddata;
		$this->data['invoice'] = $invdata;
		$this->data['payments'] = $paymentdata;
		$this->data['quotes'] = $quotesdata;
		
		/*if(array_key_exists(29, $this->data['invoice']))
		{
			echo "<pre>";
			print_r($this->data['invoice'][29]);
			echo "</pre>";
		}
		else
		{
			echo "No record exists.";
		}
		
		if(array_key_exists(29, $this->data['payments']))
		{
			echo "<pre>";
			print_r($this->data['payments'][29]);
			echo "</pre>";
		}
		else
		{
			echo "<br/>No record exists.";
		}
		
		if(array_key_exists(29, $this->data['quotes']))
		{
			echo "<pre>";
			print_r($this->data['quotes'][29]);
			echo "</pre>";
		}
		else
		{
			echo "<br/>No record exists.";
		}
		
		
		echo "<pre>";
		print_r($this->data['invoice']);
		echo "</pre>";
		
		echo "<pre>";
		print_r($this->data['payments']);
		echo "</pre>";
		
		echo "<pre>";
		print_r($this->data['quotes']);
		echo "</pre>";
		
		echo "<pre>";
		print_r($this->data['quotes'][10]);
		echo "</pre>";
		die;*/
		$this->load->view('admin/home', $this->data);
	}

	/* List of upload files */
	public function filelist($param = '')
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		if(empty($param))
		{
			redirect(base_url('admin/vendor/filelist'));
		}

		switch ($param) 
		{
			/* List of all paid files */
			case 'P':
				$this->data['var'] = 'VENDOR UPLOADS PAID LIST';
				$this->data['fileslist'] = $this->inv->fetchallfiles(array('vendor_files.paid_status'=>'1'), array('field'=>'f_id', 'type'=>'DESC'));
			break;

			/* List of unpaid files */
			case 'U':
				$this->data['var'] = 'VENDOR UPLOADS UNPAID LIST';
				$this->data['fileslist'] = $this->inv->fetchallfiles(array('vendor_files.paid_status'=>'0'), array('field'=>'f_id', 'type'=>'DESC'));
			break;

			/* List of approved files */
			case 'AP':
				$this->data['var'] = 'VENDOR UPLOADS APPROVED LIST';
				$this->data['fileslist'] = $this->inv->fetchallfiles(array('vendor_files.f_status'=>'A'), array('field'=>'f_id', 'type'=>'DESC'));
			break;

			/* List of all rejected files */
			case 'RE':
				$this->data['var'] = 'VENDOR UPLOADS REJECTED LIST';
				$this->data['fileslist'] = $this->inv->fetchallfiles(array('vendor_files.f_status'=>'R'), array('field'=>'f_id', 'type'=>'DESC'));
			break;

			/* List of all pending files */
			case 'PE':
				$this->data['var'] = 'VENDOR UPLOADS PENDING LIST';
				$this->data['fileslist'] = $this->inv->fetchallfiles(array('vendor_files.f_status'=>'P'), array('field'=>'f_id', 'type'=>'DESC'));
			break;
		}
		
		$this->load->view('admin/home', $this->data);

	}
	/* End */

	public function filedownload($file_name = '')
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		if(empty($file_name))
		{
			redirect(base_url('admin/vendor/filelist'));
		}

		$filepath = "./uploads/".base64_decode($file_name);


		// Process download
	    if(file_exists($filepath)) 
	    {
	        header('Content-Description: File Transfer');
	        header('Content-Type: application/octet-stream');
	        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
	        header('Expires: 0');
	        header('Cache-Control: must-revalidate');
	        header('Pragma: public');
	        header('Content-Length: ' . filesize($filepath));
	        flush(); // Flush system output buffer
	        readfile($filepath);
	        exit;
	    }

	}
	
	/* Downloads all vendor files */
	public function vendorfiledownloads($vendor_id)
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		$filelist = array();
		$vendortypes = array();
		$companytypes = array();
		$statelist = array();
		$banklist = array();
		
		$cond = array(
			'vendor_id'=>$vendor_id
		);
		
		$this->data['vendorinfo'] = $this->vendormodel->vendorinfo($cond);
		
		$dir_name = "./uploads/".$this->data['vendorinfo']->created_at;
		$targetfile = '';
		$sourcefile = '';
		
		/* Create a directory */
		mkdir($dir_name, 0777, true);
		
		if(!empty($this->data['vendorinfo']->trade_file))
		{
			$sourcefile = "./uploads/".$this->data['vendorinfo']->trade_file;
			$targetfile = $dir_name."/".$this->data['vendorinfo']->trade_file;
			copy($sourcefile, $targetfile);
			
			$filelist[] = $this->data['vendorinfo']->trade_file;
			
			$sourcefile = '';
			$targetfile = '';
		}
		
		if(!empty($this->data['vendorinfo']->cert_file))
		{
			$sourcefile = "./uploads/".$this->data['vendorinfo']->cert_file;
			$targetfile = $dir_name."/".$this->data['vendorinfo']->cert_file;
			copy($sourcefile, $targetfile);
			
			$filelist[] = $this->data['vendorinfo']->cert_file;
			
			$sourcefile = '';
			$targetfile = '';
		}
		
		if(!empty($this->data['vendorinfo']->pan_file))
		{
			$sourcefile = "./uploads/".$this->data['vendorinfo']->pan_file;
			$targetfile = $dir_name."/".$this->data['vendorinfo']->pan_file;
			copy($sourcefile, $targetfile);
			
			$filelist[] = $this->data['vendorinfo']->pan_file;
			
			$sourcefile = '';
			$targetfile = '';
		}
		
		if(!empty($this->data['vendorinfo']->gst_file))
		{
			$sourcefile = "./uploads/".$this->data['vendorinfo']->gst_file;
			$targetfile = $dir_name."/".$this->data['vendorinfo']->gst_file;
			copy($sourcefile, $targetfile);
			
			$filelist[] = $this->data['vendorinfo']->gst_file;
			
			$sourcefile = '';
			$targetfile = '';
		}
		
		if(!empty($this->data['vendorinfo']->cancelled_cheque_file))
		{
			$sourcefile = "./uploads/".$this->data['vendorinfo']->cancelled_cheque_file;
			$targetfile = $dir_name."/".$this->data['vendorinfo']->cancelled_cheque_file;
			copy($sourcefile, $targetfile);
			
			$filelist[] = $this->data['vendorinfo']->cancelled_cheque_file;
			
			$sourcefile = '';
			$targetfile = '';
		}
		
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$html = $this->load->view('admin/vendorinfopdf', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents($dir_name."/vendorinfo.pdf", $output);
		
		$filelist[] = 'vendorinfo.pdf';
		
		$this->load->library('zip');
		$this->zip->read_dir($dir_name, FALSE);
		
		/* Now remove each and every file in newly created directory */
		/* Then remove the empty directory */
		if(count($filelist))
		{
			foreach($filelist as $fl)
			{
				$filetoremove = $dir_name."/".$fl;
				@unlink($filetoremove);
			}
			
			/* Now remove the directory */
			rmdir($dir_name);
		}
		
		/* Download the zip file */
		$this->zip->download(str_replace(' ', '_', $this->data['vendorinfo']->company_name)."_doc".".zip");
		
	}
	/* End */

	public function vendorlist()
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		$types = array();

		$fields = array('vendor_id', 'vendor_type_id', 'company_name', 'contact_p_mob', 'vendor_status');
		$cond = array();
		$order_by = array('vendor_id'=>'DESC');

		$this->mm->setTable('vendor_info');
		$this->data['vendors'] = $this->mm->fetchAll($fields, $cond, $order_by);
		$this->mm->unsetTable();

		$this->mm->setTable('vendor_type');
		$vendortypes = $this->mm->fetchAll(array('vtype_id', 'vtype_name'), array('vtype_status'=>1));
		$this->mm->unsetTable();

		foreach($vendortypes as $vt)
		{
			$types[$vt->vtype_id] = $vt->vtype_name;
		}

		$this->data['types'] = $types;
		//$this->data['header'] = $this->load->view('templates/admin/header', $this->data, true);
		$this->load->view('admin/vendorlist', $this->data);
	}


	public function logout()
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		$seesiondata = $this->session->userdata();
		$keys = array_keys($seesiondata);
		$this->session->unset_userdata($keys);

		redirect(base_url('admin'));
	}
	
	/* Add contact section */
	/* Done by manojit on 17-05-2019 */
	public function addcontact()
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		if(!empty($this->input->post()))
		{
			//Process contact info submitted by user
			$postdata = $this->input->post();
			if(array_key_exists('contact_id', $postdata))
			{
				unset($postdata['contact_id']);
			}
			$contactinfo = $this->dfd->secureInput($postdata);
			$contactinfo['created_at'] = time();
			
			$this->mm->setTable('contacts');
			$this->mm->insert($contactinfo);
			$this->mm->unsetTable();
			
			$this->session->set_flashdata('msg', 'Contact added successfully.');
			redirect(base_url('admin/contact/list'));
		}
		
		$this->load->view('admin/contact_add', $this->data);
	}
	/* End */
	
	/* Edit contact section */
	/* Done by manojit on 20-05-2019 */
	public function editcontact($contact_id = '')
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		if(!empty($this->input->post()))
		{
			/* Process contact info submitted by user */
			$postdata = $this->input->post();
			
			if(array_key_exists('contact_id', $postdata))
			{
				unset($postdata['contact_id']);
			}
			$contactdata = $this->dfd->secureInput($postdata);
			
			$where = array(
				'contact_id'=>$contact_id
			);
			
			$this->mm->setTable('contacts');
			$this->mm->update($contactdata, $where);
			$this->mm->unsetTable();
			
			$this->session->set_flashdata('msg', 'Record updated successfully.');
			redirect(base_url('admin/contact/list'));
			/* End */
		}
		
		$cond = array(
			'contact_id'=>$contact_id
		);
		
		$this->mm->setTable('contacts');
		$this->data['contactinfo'] = $this->mm->fetchOne($cond);
		$this->mm->unsetTable();
		$this->data['contact_id'] = $contact_id;
		$this->load->view('admin/contact_add', $this->data);
	}
	/* End */
	
	/* List of all contacts */
	/* Done by manojit on 17-05-2019 */
	public function contactlist()
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		$fields = array();
		$cond = array(
			'active_status'=>'1'
		);
		$order_by = array('contact_id'=>'DESC');
		
		$this->mm->setTable('contacts');
		$this->data['contacts'] = $this->mm->fetchAll($fields, $cond, $order_by);
		$this->mm->unsetTable();
		
		$this->load->view('admin/contact_list', $this->data);
	}
	/* End */
	
	
	public function vendorassign($contact_id = '')
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		$this->data['vendors'] = $this->contactmodel->fetchallvendors($contact_id);
		$this->data['contact_id'] = $contact_id;
		$this->load->view('admin/vendor_assign', $this->data);
	}
	
	public function assignprocess($contact_id = '')
	{
		if(!($this->session->has_userdata('u_id')))
		{
			redirect(base_url('admin'));
		}
		
		if(empty($this->input->post()))
		{
			redirect(base_url('admin'));
		}
		
		$vendorcontact = array();
		$postdata = $this->input->post();
		$vendorlist = $postdata['vendorinfo'];
		
		$this->mm->setTable('vendor_contacts');
		$this->mm->delete(array('contact_id'=>$contact_id));
		$this->mm->unsetTable();
		
		if(count($vendorlist) > 0)
		{
			foreach($vendorlist as $vendorid)
			{
				$vendorcontact[] = array(
					'vendor_id' => $vendorid,
					'contact_id' => $postdata['contact_id'],
					'created_at' => time()
				);
			}
			
			$this->mm->setTable('vendor_contacts');
			$this->mm->insertbatch($vendorcontact);
			$this->mm->unsetTable();
			
			$this->session->set_flashdata('msg', 'Vendor assigned successfully.');
		}
		
		redirect(base_url('admin/contact/list'));
	}
	
}