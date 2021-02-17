<?php

/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for user [HMVC]. Handles all the datatypes and methodes required
 * for user section of Best Breakfast
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
        $this->load->model('admin/Settingsmodel');
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
       
        $all_data = $this->Settingsmodel->load_all_data();
      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;

        $this->middle = 'settings/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Settings Added Successfully";
        $id = '1';
        $uri = $this->uri->segment(1);
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Settings Updated Successfully";
        }

        if($this->input->post())
        {

           /* $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {*/
            $flg = $this->Settingsmodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-add-setting');
            redirect($redirect);
           /* }*/

        }
        else
        {  

            
            $data=array();

            $where['id']='1';
            $all_data=$this->Settingsmodel->get_row_data('settings',$where);



            $this->data             = array();
            $this->data['uri']      = $uri;
            $this->data['result']   = $all_data;

            $this->middle = 'settings/admin/form';
            $this->admin_layout();

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
        $data = $this->Settingsmodel->get_row_data('settings', ['id' => $id]);
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
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status($id) {
        $flg = $this->Settingsmodel->status($id);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Setting status changed successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-setting-list'));
    }

    /**
     * Delete function of user module
     *
     * @access  public
     * @param   id
     * @return  success of failure of delete
     */
    public function delete() {
        $flg = $this->Settingsmodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-setting-list'));
    }

}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
