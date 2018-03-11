<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    private $head;
	public function __construct(){
		parent::__construct();
		$this->head['berita'] = $this->ModelBooking->selectAll()->num_rows();
	}
    
     //halaman utama
	public function index()
	{
        if(isset($_SESSION['logged_in'])){
			$this->load->view('admin/layouts/header');
			$this->load->view('admin/index');
			$this->load->view('admin/layouts/footer');
		}else{
			redirect('admin/login/unauth');
		}
		
    }
    
    public function login()
	{
		$this->load->view('admin/login');
    }
	
	public function auth(){
		$post = $this->input->post();
		$data = $this->ModelUser->check($post['uname'],md5($post['pass']))->row_array();
		if(!isset($data)){
			redirect('admin/login/failed');			 
		}else{
			$userdata = array(
				'username'  => $data['username'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);
			redirect('admin/');			
		}
	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect('');
	}

	// public function gantiPassword(){
	// 	$this->load->view('admin/layouts/header',$this->head);
	// 	$this->load->view('admin/gantiPassword');
	// 	$this->load->view('admin/layouts/footer');		
	// }

	// public function updatePass(){
	// 	$form = $this->input->post();
	// 	$data = $this->ModelAkun->check($this->session->userdata('username'),md5($form['old']))->row_array();

	// 	if(isset($data)){
	// 		// var_dump);
	// 		$update['password'] = md5($form['new']);
	// 		$this->ModelAkun->update($data['id'],$update);
	// 		redirect('admin/login/change');
	// 	}else{
	// 		redirect('admin/gantiPassword/failed');
	// 	}
		
	// }

    public function bookingAll()
	{
        if(isset($_SESSION['logged_in'])){
			$data['all'] = $this->ModelBooking->selectAll()->result_array();		
			$this->load->view('admin/layouts/header',$this->head);
			$this->load->view('admin/bookingAll',$data);
			$this->load->view('admin/layouts/footer');
		}else{
			redirect('admin/login/unauth');
		}
    }
}
