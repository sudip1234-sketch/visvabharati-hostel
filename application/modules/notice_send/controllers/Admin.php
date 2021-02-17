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
        $this->load->model('admin/NoticeSendModel');
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

        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['success'] = '';
        
        if(isset($_GET['search'])){
            $all_data = $this->NoticeSendModel->load_all_data();
            $this->data['all_data'] = $all_data;

            $message = $_GET['mes'];
            foreach($all_data as $val){
                $ch     = curl_init();  
                curl_setopt($ch,CURLOPT_URL,'http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=91'.$val->contact_no.'&source=VBHSTL&message='.urlencode($message));
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 0 );    
                $output = curl_exec($ch);
                curl_close($ch); 
            }

            $this->data['success'] = 'SMS have send successfully..';

        }else{
            $this->data['all_data'] = array();
        }

      
        if(isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!=''){
            $this->data['all_courses']       = $this->NoticeSendModel->get_result_data('course', ['is_active' => 'Y','institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_courses']       = array();
        }

        if((isset($_GET['search_by_course']) && $_GET['search_by_course']!='') && (isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!='')){
            $this->data['all_departments']       = $this->NoticeSendModel->get_result_data('department', ['is_active' => 'Y','course_id'=>$_GET['search_by_course'],'institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_departments']       = array();
        }
        

        $this->data['all_institutes']    = $this->NoticeSendModel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_hostels']       = $this->NoticeSendModel->get_result_data('hostel', ['is_active' => '1']);
        $this->middle = 'notice_send/admin/list';
        $this->admin_layout();
    }


}
/* End of file admin.php */
/* Location: ./application/modules/allotment_report/controllers/admin.php */
