<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
  public function __construct() {
        parent::__construct();
        $this->load->model('admin/Adminauthmodel');
        $this->load->database();
    }
    
	public function index()
	{
        admin_not_authenticate();
        $this->load->view('admin/login');
	}

	public function check_login() {

        $res_save = $this->Adminauthmodel->admin_login();
    }

    public function admin_logout() {

        $res_logout = $this->Adminauthmodel->admin_logout();
    }

    public function check_forgot_password() {
      admin_not_authenticate();
      
      if (!empty($this->input->post())) {
        $res_save = $this->Adminauthmodel->admin_forgot_password();
        redirect(base_url('admin'));
      }
        
      $this->load->view('admin/forgotPassword');

    }

    public function dashboard() {

        admin_authenticate();
        $uri                      = $this->uri->segment(1);
        $this->data               = array();
        $this->middle             = 'admin/dashboard';
        $this->admin_layout();
    }
}
