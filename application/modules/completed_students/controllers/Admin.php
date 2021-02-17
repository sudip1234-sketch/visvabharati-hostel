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
        $this->load->model('admin/CompletedStudentmodel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
   public function index(){
      $all_data         = array();
      $student_details  = array();

      if(@$_GET['search_by_hostel']){
        $all_data = $this->CompletedStudentmodel->load_all_student_by_hostelid();
        
      }
        
        $completed_students_array = array();
        $year = date("Y");
        $month = date("m");

        foreach ($all_data as $key => $value) {
            $student_id = str_split($value->student_id);
            $course_total_year = $value->total_year;
            $admissionYear = $student_id[7].$student_id[8];
            $admissionYear = '20'.$admissionYear;
            $completed_year = $course_total_year + $admissionYear;
            if((($completed_year ==  $year) && ($month > 6)) ||  ($completed_year < $year)){
                $completed_students_array[$key]['student_id'] = $value->student_id;
                $completed_students_array[$key]['course_name'] = $value->course_name;
                $completed_students_array[$key]['full_name'] = $value->full_name;
                $completed_students_array[$key]['course_total_year'] = $value->total_year;

            }
        }

       
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $completed_students_array;
        $this->data['all_data_student'] = $student_details;

        $this->data['all_hostels'] = $this->CompletedStudentmodel->get_result_data('hostel', ['is_active' => '1']);
       // print_r($this->data['all_data']);die();
        $this->middle = 'completed_students/admin/list';
        $this->admin_layout();
    }

    


}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
