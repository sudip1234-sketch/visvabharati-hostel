<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for Sub-admin [HMVC]. Handles all the datatypes and methodes required
 * for Sub-admin section of Best Breakfast
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
        $this->load->model('admin/Rolemodel');
        $this->load->helper('email_helper');
    }

    /**
     * Index Page for this Sub-admin controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {

        $uri = $this->uri->segment(1);
        $all_data = $this->Rolemodel->load_all_data();
      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;

        $this->middle = 'role/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Role Added Successfully";
        $id = $this->input->post('ad_id');
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Role Updated Successfully";
        }


        if($this->input->post())
        {

            $flg = $this->Rolemodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-role-list');
            redirect($redirect);
           

        }
        
    }


     /**
     * details Change function of Sub-admin module
     *
     * @access  public
     * @param   id
     * @return  success of failure of details change
     */
    public function details() {


        $id = $this->input->post('id');
        $data = $this->Rolemodel->get_row_data('admin', ['id' => $id]);
       /* echo "<pre>";
        print_r($data);*/

        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


     /**
     * Status Change function of Sub-admin module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status($id) {

        $flg = $this->Rolemodel->status($id);      

        if (!empty($flg)) 
        {
            $this->session->set_flashdata('successmessage', 'Status Changed Successfully.');
        }
        else 
        {
            $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
        }
        $redirect = base_url('admin-role-list');
        redirect($redirect);
       
    }

    /**
     * Delete function of Sub-admin module
     *
     * @access  public
     * @param   id
     * @return  success of failure of delete
     */
    public function delete() {
        $flg = $this->Rolemodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-role-list'));
    }


 public function check_email()
    {
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        $where[$field] = $value;

        echo $this->Rolemodel->isunique($where) ? "true" : "false";
    }
}
/* End of file admin.php */
/* Location: ./application/modules/role/controllers/admin.php */
