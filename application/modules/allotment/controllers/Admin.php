<?php
/**
 * No direct access
 */
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

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
        $this->load->model('admin/Allotmentmodel');
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
        $student_list_with_pages = $this->Allotmentmodel->load_all_data();
        $all_data = $student_list_with_pages[0];
        $search_num_pages = $student_list_with_pages[1];

        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;

        $this->data['all_bloodgroups']  = $this->Allotmentmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
        if(isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!=''){
            $this->data['all_courses'] = $this->Allotmentmodel->get_result_data('course', ['is_active' => 'Y','institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_courses']  = array();
        }

        $this->data['all_courses_edit'] = $this->Allotmentmodel->get_result_data('course', ['is_active' => 'Y']);

        if((isset($_GET['search_by_course']) && $_GET['search_by_course']!='') && (isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!='')){
            $this->data['all_departments'] = $this->Allotmentmodel->get_result_data('department', ['is_active' => 'Y','course_id'=>$_GET['search_by_course'],'institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_departments'] = array();
        }

        $this->data['all_courses_only'] = $this->Allotmentmodel->getCourse();//03122020
        $this->data['all_departments_only'] = $this->Allotmentmodel->getDepartment();//03122020

        $this->data['all_departments_edit'] = $this->Allotmentmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes'] = $this->Allotmentmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states'] = $this->Allotmentmodel->get_result_data('state', ['is_active' => 'Y']);
        $this->data['all_hostels'] = $this->Allotmentmodel->get_result_data('hostel', ['is_active' => '1']);
        $this->data['all_hostel_blocks'] = $this->Allotmentmodel->get_result_data('hostel_block', ['is_active' => 'Y']);
        $this->data['all_hostel_floors'] = $this->Allotmentmodel->get_result_data('hostel_floor', ['is_active' => 'Y']);
        $this->data['query_string_received'] = $this->input->server('QUERY_STRING');
        $this->data['search_num_pages'] = $search_num_pages;
        $this->middle = 'allotment/admin/list';
        $this->admin_layout();
    }

     public function form($id=NULL) {
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Allotment Added Successfully";
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Allotment Updated Successfully";
        }

        if($this->input->post())
        {
            $flg = $this->Allotmentmodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-allotment-list');
            redirect($redirect);
        }
    }

    public function adminEditStudent($id = '') {
        if(empty($id)) {
            show_error('Student with the given id not found :(', 404, 'Student with the given id not registered!');
        } else {
            $data = $this->Allotmentmodel->get_row_data($id);
            if(empty($data)) {
                show_error('Student with the given id not found :(', 404, 'Student with the given id not registered!');
            } else {
                $this->data['student'] = $data;
                $this->data['all_bloodgroups']  = $this->Allotmentmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
                $this->data['all_courses_edit'] = $this->Allotmentmodel->get_result_data('course', ['is_active' => 'Y']);
                $this->data['all_departments_edit'] = $this->Allotmentmodel->get_result_data('department', ['is_active' => 'Y']);
                $this->data['all_institutes'] = $this->Allotmentmodel->get_result_data('institute', ['is_active' => 'Y']);
                $this->data['all_states'] = $this->Allotmentmodel->get_result_data('state', ['is_active' => 'Y']);
                $this->data['all_hostels'] = $this->Allotmentmodel->get_result_data('hostel', ['is_active' => '1']);
                $this->data['all_hostel_blocks'] = $this->Allotmentmodel->get_result_data('hostel_block', ['is_active' => 'Y']);
                $this->data['all_hostel_floors'] = $this->Allotmentmodel->get_result_data('hostel_floor', ['is_active' => 'Y']);
                // echo '<pre>';print_r($this->data);die();
                $this->middle = 'allotment/admin/edit_student';
                $this->admin_layout();
            }
        }
    }

    public function modifyStudentInfo($id) {
        $flg = $this->Allotmentmodel->update($id);
        if($flg) {
            redirect('admin-edit-student/'.$flg);
        } else {
            show_error("Please try again", 400, 'Sorry: something went wrong!');
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
        $flg = $this->Usermodel->status($id);

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
        $flg = $this->Usermodel->delete($id);

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
        $data = $this->Allotmentmodel->get_row_data($id);
        $data->date_of_allotment = date('d/m/Y',strtotime($data->date_of_allotment));

        if(!empty($data)) {
            echo json_encode($data);
        } else {
            echo false;
        }
    }

     /**
     * Get Hostel Details
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function hostel_details() {

        $id   = $this->input->post('id');
        $data = $this->Allotmentmodel->get_row_result('hostel', ['id' => $id]);
      
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
     * Get Hostel Room Details
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function hostel_list() {

       // echo 'test'; exit;

        $gender     = $this->input->post('gender');

        $type = '';

        if($gender == 'male')
        {
            $type = 'boys';
        }

        if($gender == 'female')
        {
            $type = 'girls';
        }
    
        $data = $this->Allotmentmodel->get_result_data('hostel', ['hostel_type' => $type]);
      
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
     * Get Hostel Room Details
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function hostel_rooms() {

        $id         = $this->input->post('id');
        $block_id   = $this->input->post('block_id');
        $floor_id   = $this->input->post('floor_id');

        $data = $this->Allotmentmodel->get_result_data('hostel_rooms_seats', ['hostel_id' => $id,'block_id' => $block_id,'floor_id' => $floor_id,'block' => '0','is_active' => '1']);
      
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
     * Get Hostel Beds
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function hostel_beds_booked() {

        $hostel_id   = $this->input->post('hostel_id');
        $block_no    = $this->input->post('block_no');
        $floor_no    = $this->input->post('floor_no');
        $room_no     = $this->input->post('room_no');

        $data = $this->Allotmentmodel->get_result_array('student', ['hostel_name' => $hostel_id,'block_no' => $block_no,'floor_no' => $floor_no,'room_no' => $room_no]);

        //$data = $this->Allotmentmodel->get_row_result('hostel_rooms_seats', ['hostel_id' => $hostel_id,'block_id' => $block_no,'floor_id' => $floor_no,'room_no' => $room_no,'block' => 0,'is_active' => 1]);

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
     * Get Hostel Beds
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function get_student_details() {

        $id   = $this->input->post('student_id');
        
        $data = $this->Allotmentmodel->get_row_result('student', ['id' => $id]);

        $student_id =  $data->student_id;
        $password =  $data->password;

        $this->db->select('*');
        $this->db->from(tablename('student'));
        $this->db->where('student_id', $student_id);
        $this->db->where('password', $password);
       
        $query = $this->db->get();
        $user_result = $query->row();

        if (!empty($user_result)) {
            $_login_array_userdata = (object) ['uid' => $user_result->id, 'detail' => $user_result];


            $this->session->set_userdata('front', $_login_array_userdata);
            $this->session->set_userdata('userFullName', $user_result->full_name);
            $this->session->set_userdata('userid', $user_result->id);
            $this->session->set_userdata('successmessage', 'Successfully logged in!');
            echo 'true';

        } else {
             echo 'false';
        }
    }




     /**
     * Get Hostel Beds
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function hostel_beds() {

        $hostel_id   = $this->input->post('hostel_id');
        $block_no    = $this->input->post('block_no');
        $floor_no    = $this->input->post('floor_no');
        $room_no     = $this->input->post('room_no');

        $data = $this->Allotmentmodel->get_row_result('hostel_rooms_seats', ['hostel_id' => $hostel_id,'block_id' => $block_no,'floor_id' => $floor_no,'room_no' => $room_no,'is_active' => '1']);


        $data_seats_booked = $this->Allotmentmodel->get_result_data('student', ['hostel_name' => $hostel_id,'block_no' => $block_no,'floor_no' => $floor_no,'room_no' => $room_no]);

        if(!empty($data_seats_booked))
        {
            $beds_booked = array();
            $i =0;
            foreach($data_seats_booked as $total_booked_beds)
            {
                $beds_booked[$i] = $total_booked_beds->bed_no;
                $i++;
            }

            if($beds_booked)
            {
                 $data->booked_total_seats = implode(",",$beds_booked);

            }
           
        }

        //$data = $this->Allotmentmodel->get_row_result('hostel_rooms_seats', ['hostel_id' => $hostel_id,'block_id' => $block_no,'floor_id' => $floor_no,'room_no' => $room_no,'block' => 0,'is_active' => 1]);

        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function get_hostel_blocks() {
        //echo "<pre>"; print_r($_POST); die;
        $hostel_id   = $this->input->post('hostel_id');

        $data = $this->db->select('hostel_rooms_seats.*,hostel_block.block_name')->join('hostel_block','hostel_block.id = hostel_rooms_seats.block_id','left')->where('hostel_rooms_seats.hostel_id',$hostel_id)->where('hostel_rooms_seats.block','0')->where('hostel_rooms_seats.is_active','1')->group_by('hostel_rooms_seats.block_id')->get('hostel_rooms_seats')->result();

        //echo "<pre>"; print_r($data); die;

        //$option = '<option selected="">Choose...</option>';
        $option = '<option value="">Select</option>';
        if(!empty($data)){
            foreach ($data as $value) {
                $option .= '<option value="'.$value->block_id.'">'.$value->block_name.'</option>';
            }
        }
        
       
       echo $option; exit();           
    }

public function get_hostel_floor() {
        //echo "<pre>"; print_r($_POST); die;
        $hostel_id   = $this->input->post('hostel_id');
        $block_id   = $this->input->post('block_id');

        $data = $this->db->select('hostel_rooms_seats.*,hostel_floor.floor_name')->join('hostel_floor','hostel_floor.id = hostel_rooms_seats.floor_id','left')->where('hostel_rooms_seats.hostel_id',$hostel_id)->where('hostel_rooms_seats.block_id',$block_id)->where('hostel_rooms_seats.block','0')->where('hostel_rooms_seats.is_active','1')->group_by('hostel_rooms_seats.floor_id')->get('hostel_rooms_seats')->result();

        //echo "<pre>"; print_r($data); die;

        //$option = '<option selected="">Choose...</option>';
        $option = '<option value="">Select</option>';
        if(!empty($data)){
            foreach ($data as $value) {
                $option .= '<option value="'.$value->floor_id.'">'.$value->floor_name.'</option>';
            }
        }
        
       
       echo $option; exit();           
    }


    public function admin_allotment_student() {
        //echo "<pre>"; print_r($_POST); //die;
        $hostel = $this->db->select('*')->where('id',$_POST['hostel_name'])->get('hostel')->row();
        //echo "<pre>"; print_r($hostel); die;
        $students_ids = explode(',', $_POST['students_ids']);
//echo "<pre>"; print_r($students_ids); die;
        if(!empty($students_ids)){
            foreach ($students_ids as $value) {
                $students = $this->db->select('*')->where('id',$value)->get('student')->row();
                $hostel_id = $hostel->hostel_code.'_'.$students->student_id;

                $data_save = array('hostel_id'=>$hostel_id,'hostel_name'=>$_POST['hostel_name'],'hostel_code'=>$hostel->hostel_code,'allotment_assigned'=>1);

                $this->db->where('id', $value)->update(tablename('student'), $data_save);
            }

        }

        $this->session->set_flashdata('successmessage', 'Students Alloted Successfully');
        $redirect = base_url('admin-allotment-list');
            redirect($redirect);
    }


     public function allotment_cancel() {

        $id   = $this->input->post('id');
        $cancel_reason   = $this->input->post('cancel_reason');
        $flg = $this->Allotmentmodel->allotment_cancel($id, $cancel_reason);

        $this->session->set_flashdata('successmessage', 'Students Allocation Cancelled Successfully');

        if(!empty($flg))
        {
            echo json_encode($flg);
        }
        else
        {
            echo false;
        }
    }


    public function release_seat() {

        $id   = $this->input->post('id');
        $flg = $this->Allotmentmodel->release_seat($id);

        $this->session->set_flashdata('successmessage', 'Seat Released Successfully');

        if(!empty($flg))
        {
            echo json_encode($flg);
        }
        else
        {
            echo false;
        }
    }


    public function download_allotment() {
        $heading =  '"Sl No", '.
                    '"Student Id", '.
                    '"Name", '.
                    '"Bhavana", '.
                    '"Department", '.
                    '"Course", '.
                    '"Semester", '.
                    '"Category", '.
                    '"Pwd Stutus", '.
                    '"Application Date", ' .
                    '"Last exam Marks", '.
                    '"Pin", '.
                    '"Nationality", '.
                    '"Final Score", '.
                    '"Rank"';

        $csvf = fopen('Allotment.csv', 'w');
        fwrite($csvf, $heading);
        fwrite($csvf, "\n");

        $search_data = $this->Allotmentmodel->load_all_data('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname', FALSE);
        $all_data = $search_data[0];
        
        if(!empty($all_data)){
            $i =1;
            foreach($all_data as $student) {
                $row =  '"' . $i . '"' . ', ' .
                        '"' . $student->student_id . '"' . ', ' .
                        '"' . $student->full_name . '"' . ', ' .
                        '"' . $student->institute_name . '"' . ', ' .
                        '"' . $student->department_name . '"' . ', ' .
                        '"' . $student->course_name . '"' . ', ' .
                        '"' . $student->semester . '"' . ', ' .
                        '"' . $student->caste_type . '"' . ', ' .
                        '"' . $student->pwd_status . '"' . ', ' .
                        '"' . $student->created_date . '"' . ', ' .
                        '"' . $student->last_final_exam_score . '"' . ', ' .
                        '"' . $student->pincode . '"' . ', ' .
                        '"' . $student->nationality_type . '"' . ', ' .
                        '"' . $student->final_score . '"' . ', ' .
                        '"' . $student->rank . '"';
                fwrite($csvf, $row);
                fwrite($csvf, "\n");
                $i++;
            }
        }
        fclose($csvf);

        $spreadsheet = new Spreadsheet();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
         
        /* Set CSV parsing options */
        $reader->setDelimiter(',');
        $reader->setEnclosure('"');
        $reader->setSheetIndex(0);
         
        /* Load a CSV file and save as a XLS */
        $spreadsheet = $reader->load("Allotment.csv");
        $writer = new Xls($spreadsheet);
        $writer->save('Allotment.xls');
         
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        header('Content-Description: File Transfer');
        header("Content-type: application/msword; charset=utf-8");
        header("Content-Disposition: attachment;Filename=Allotment.xls");
        readfile("Allotment.xls");
        unlink("Allotment.csv");
        unlink("Allotment.xls");
        die;
    }

    public function download_allotment_all() {
        $heading =  '"Sl No", '.
                    '"Room No", '.
                    '"Bed Number", '.
                    '"Block Number", '.
                    '"Floor", '.
                    '"Student Id", '.
                    '"Name", '.
                    '"Hostel Name", '.
                    '"Bhavana", '.
                    '"Department", '.
                    '"Course", '.
                    '"Semester", '.
                    '"Category", '.
                    '"Pwd Stutus", '.
                    '"Application Date", ' .
                    '"Last exam Marks", '.
                    '"Pin", '.
                    '"Nationality", '.
                    '"Contact No", '.
                    '"Email Id", '.
                    '"Blood Group", '.
                    '"gender", '.
                    '"Guardian Name", '.
                    '"Guardian Contact No", '.
                    '"Guardian Email Id", '.
                    '"Address 1", '.
                    '"Address 2", '.
                    '"Aadhar Card No", '.
                    '"DOB", '.
                    '"VB Reg Id", '.
                    '"Date of Allotment", '.
                    '"Hostel Assign Date", '.
                    '"Final Score", '.
                    '"Rank"';

        $csvf = fopen('Allotment_all.csv', 'w');
        fwrite($csvf, $heading);
        fwrite($csvf, "\n");

        $search_data = $this->Allotmentmodel->load_all_data('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname,hos.hostel_name as hostel_name_full', FALSE);
        $all_data = $search_data[0];
        
        if(!empty($all_data)){
            $i =1;
            foreach($all_data as $student) {
                $row =  '"' . $i . '"' . ', ' .
                        '"' . $student->room_no . '"' . ', ' .
                        '"' . $student->bed_no . '"' . ', ' .
                        '"' . $student->block_no . '"' . ', ' .
                        '"' . $student->floor_no . '"' . ', ' .
                        '"' . $student->student_id . '"' . ', ' .
                        '"' . $student->full_name . '"' . ', ' .
                        '"' . $student->hostel_name_full . '"' . ', ' .
                        '"' . $student->institute_name . '"' . ', ' .
                        '"' . $student->department_name . '"' . ', ' .
                        '"' . $student->course_name . '"' . ', ' .
                        '"' . $student->semester . '"' . ', ' .
                        '"' . $student->caste_type . '"' . ', ' .
                        '"' . $student->pwd_status . '"' . ', ' .
                        '"' . $student->created_date . '"' . ', ' .
                        '"' . $student->last_final_exam_score . '"' . ', ' .
                        '"' . $student->pincode . '"' . ', ' .
                        '"' . $student->nationality_type . '"' . ', ' .
                        '"' . $student->contact_no . '"' . ', ' .
                        '"' . $student->email_id . '"' . ', ' .
                        '"' . $student->blood_group  . '"' . ', ' .
                        '"' . $student->gender . '"' . ', ' .
                        '"' . $student->guardian_name . '"' . ', ' .
                        '"' . $student->guardian_contact_no . '"' . ', ' .
                        '"' . $student->guardian_email_id . '"' . ', ' .
                        '"' . $student->address . '"' . ', ' .
                        '"' . $student->guardian_address . '"' . ', ' .
                        '"' . $student->aadhar_card_no . '"' . ', ' .
                        '"' . $student->date_of_birth . '"' . ', ' .
                        '"' . $student->vb_reg_id . '"' . ', ' .
                        '"' . $student->date_of_allotment . '"' . ', ' .
                        '"' . $student->hostel_assign_date . '"' . ', ' .
                        '"' . $student->final_score . '"' . ', ' .
                        '"' . $student->rank . '"';
                fwrite($csvf, $row);
                fwrite($csvf, "\n");
                $i++;
            }
        }
        fclose($csvf);

        $spreadsheet = new Spreadsheet();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
         
        /* Set CSV parsing options */
        $reader->setDelimiter(',');
        $reader->setEnclosure('"');
        $reader->setSheetIndex(0);
         
        /* Load a CSV file and save as a XLS */
        $spreadsheet = $reader->load("Allotment_all.csv");
        $writer = new Xls($spreadsheet);
        $writer->save('Allotment_all.xls');
         
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        header('Content-Description: File Transfer');
        header("Content-type: application/msword; charset=utf-8");
        header("Content-Disposition: attachment;Filename=Allotment_all.xls");
        readfile("Allotment_all.xls");
        unlink("Allotment_all.csv");
        unlink("Allotment_all.xls");
        die;
    }

    public function download_PDF() {
      $data = array();
      $data['all_data'] = $this->Allotmentmodel->load_all_data('st.*');
      $this->load->view('allotment/admin/download_pdf',$data);
    }


    public function check_student_id_admin()
    {
        $student_id= $this->input->post('student_id'); 
        $student = $this->Allotmentmodel->get_row_result('student', ['student_id' => $student_id]);

        if(!empty($student))
        {
            echo 'true'; exit();
        }
        else
        {
            echo 'false'; exit();
        }
    }
}