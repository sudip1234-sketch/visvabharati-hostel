<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for user [HMVC]. Handles all the datatypes and methodes required
 * for user section of Visvabharati
 */
class Admin extends MX_Controller {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        admin_authenticate();
        $this->load->model('admin/MessChargeModel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {

        $uri = $this->uri->segment(1);
        $all_data = $this->MessChargeModel->load_all_data();
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['all_hostels'] = $this->MessChargeModel->get_result_data('hostel', ['is_active' => '1']);
        $this->middle = 'messCharge/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Mess Charge Added Successfully";
        $id = $this->input->post('ad_id');
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Mess Charge Updated Successfully";
        }

        if($this->input->post())
        {
            //echo "<pre>"; print_r($_POST); die;
           $flg = $this->MessChargeModel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-mess-charge');
            redirect($redirect);         

        }        
    }


     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function details() {


        $id = $this->input->post('id');
        $sess_id = $this->input->post('sess_id');
        $data = $this->MessChargeModel->load_single_data($sess_id);
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function check_year()
    {
        //echo "<pre>"; print_r($this->input->post()); die;
        $field = $this->input->post('field');
        $value = $this->input->post('value');
        $ad_id = $this->input->post('ad_id');

        $hostel = $this->input->post('hostel');

        $where[$field] = $value;
       // $where[$hostel] = ' IN (1,2,4)';
        $where_in = '`hostel_id` IN ('.implode(',', $hostel).')';
        if($ad_id!=''){
            $where['id'] = '<>'.$ad_id;
        }        
        echo $this->MessChargeModel->isunique($where,$where_in) ? "true" : "false";
    }
    
    public function delete() {
        $flg = $this->MessChargeModel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Mess Charge deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-mess-charge'));
    }
}
/* End of file admin.php */
/* Location: ./application/modules/messCharge/controllers/admin.php */
