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
        $this->load->model('admin/Allotmentcardmodel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {
        $this->data = array();

        $search_keyword = $this->input->get('search_keyword');
        if(!empty($search_keyword)) {
            $all_data = $this->Allotmentcardmodel->load_all_data();
            $this->data['all_data'] = $all_data;
        } else {
            $this->data['all_data'] = array();
        }

        $uri = $this->uri->segment(1);
        $this->data['uri'] = $uri;

        $this->data['all_courses']      = $this->Allotmentcardmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Allotmentcardmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Allotmentcardmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states']       = $this->Allotmentcardmodel->get_result_data('state', ['is_active' => 'Y']);


        $where = array();
        $where['id']='1';
        $setting_data=$this->Allotmentcardmodel->get_row_data('settings',$where);

        $this->data['setting'] = $setting_data->hostel_rules_and_regulations;

        $this->middle = 'allotmentcard/admin/list';
        $this->admin_layout();
    }
     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status($id) {
        $flg = $this->Allotmentcardmodel->status($id);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'User status changed successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-user-list'));
    }

    /**
     * Delete function of user module
     *
     * @access  public
     * @param   id
     * @return  success of failure of delete
     */
    public function delete($id) {
        $flg = $this->Allotmentcardmodel->delete($id);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'User deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-user-list'));
    }

        /**
     * Fetch Student Details
     *
     * @access  public
     * @param   id
     * @return  returns student details
     */
    public function details() {

        $id = $this->input->post('id');
       // $data = $this->Allotmentmodel->get_row_data('student', ['id' => $id]);
        $data = $this->Allotmentcardmodel->get_row_data1($id);
        $data->date_of_allotment = date('d/m/Y',strtotime($data->date_of_allotment));

        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
