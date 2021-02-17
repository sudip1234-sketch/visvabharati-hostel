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
        $this->load->model('admin/AllotmentReportmodel');
        $this->load->model('front/Authmodel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {
       
        $all_data = $this->AllotmentReportmodel->load_all_data();
       // echo "<pre>"; print_r($all_data); die;
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        
        if(isset($_GET['search'])){
           $this->data['all_data'] = $all_data;
        }else{
            $this->data['all_data'] = array();
        }

      
        if(isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!=''){
            $this->data['all_courses']       = $this->AllotmentReportmodel->get_result_data('course', ['is_active' => 'Y','institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_courses']       = array();
        }

        if((isset($_GET['search_by_course']) && $_GET['search_by_course']!='') && (isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!='')){
            $this->data['all_departments']       = $this->AllotmentReportmodel->get_result_data('department', ['is_active' => 'Y','course_id'=>$_GET['search_by_course'],'institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_departments']       = array();
        }
        

        $this->data['all_institutes']    = $this->AllotmentReportmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_hostels']       = $this->AllotmentReportmodel->get_result_data('hostel', ['is_active' => '1']);
        $this->middle = 'allotment_report/admin/list';
        $this->admin_layout();
    }
}
/* End of file admin.php */
/* Location: ./application/modules/allotment_report/controllers/admin.php */
