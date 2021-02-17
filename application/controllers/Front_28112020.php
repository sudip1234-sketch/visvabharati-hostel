<?php
/**
 * No direct access 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front extends MY_Controller {
    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the method,helper,library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('front/Authmodel');
        $this->load->model('front/Frontmodel');
        $this->load->helper('email_helper');
        $this->load->helper('others_helper');
        $this->load->model('allotment/admin/Allotmentmodel');
    }

    /**
     * Index Page for this controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {
        $this->data                     = array();
        $this->data['notice_list']      = $this->db->select('*')->where('is_active','1')->order_by('id','desc')->get('notice')->result();
        $this->middle                   = 'front/index';
        $this->layout();
    }


     /**
     * Login Page for this controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function login() {   
        if ($this->input->post()) {
            $this->form_validation->set_rules('student_id', 'Student Id', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->Authmodel->user_login();
            }

        }

        $this->middle = 'front/index';
        $this->layout();
    }
    

    /**
     * Used for logout of an user from the site
     *
     * @access  public
     * @param   none
     * @return  string. The success or failure of logout. 
     */
    public function logout() {
        $this->session->unset_userdata('front');
        $this->session->unset_userdata('userid');
        $this->session->set_userdata('successmessage', 'Successfully logged-out!');
        redirect(base_url(''));
    }


 public function get_course_list()
    {
        $institute_id   = $this->input->post('institute_id'); 
        $data           = $this->Frontmodel->get_result_data('course', ['institute_id' => $institute_id]);
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }



    public function get_subject_list()
    {
        $institute_id   = $this->input->post('institute_id'); 
        $course_id      = $this->input->post('course_id'); 
        $data           = $this->Frontmodel->get_result_data('department', ['institute_id' => $institute_id,
            'course_id' => $course_id]);


        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }

     public function check_email()
    {
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        $where[$field] = $value;
        $where['status'] = 1;

        echo $this->Frontmodel->isunique($where) ? "true" : "false";
    }


   public function generate_student_id()
    {
        $student_id         = $this->input->post('student_id');
        $chk_student_id = $this->db->select('*')->where('stu_first_no',$student_id)->order_by('sl_no','desc')->limit('1')->get('student')->row();

        if(!empty($chk_student_id))
        {
           $student_id_unique = ($chk_student_id->sl_no + 01);
        }
        else
        {
            $student_id_unique = 01;
        }

        echo sprintf("%02d", $student_id_unique); exit();
    }


    public function check_student_id_exist()
    {
        $renewal_student_id      = $this->input->post('renewal_student_id'); 
       


        $student_exist          = $this->Frontmodel->get_row_data('student', ['student_id' => $renewal_student_id]);
       
        if(!empty($student_exist))
        {
            echo true;
        }
        else
        {
            echo false;
        }
    }


    public function studentprofile() {

        $user_id                            = $this->session->userdata("userid"); 

        if($user_id)
        {
            $this->data                     = array();
            $id                             = $user_id;

            $student_details  = $this->db->select('student.*, hostel.hostel_name as hostel_name_name, hostel_floor.floor_name, hostel_block.block_name,course.course_name')->join('hostel','hostel.id = student.hostel_name','left')->join('hostel_block','hostel_block.id = student.block_no','left')->join('hostel_floor','hostel_floor.id = student.floor_no','left')->join('course','course.id = student.course_id','left')->where('student.id',$id)->get('student')->row();
            $this->data['student_details'] = $student_details;
            $this->data['all_courses']      = $this->Frontmodel->get_result_data('course', ['is_active' => 'Y']);
            $this->data['all_departments']  = $this->Frontmodel->get_result_data('department', ['is_active' => 'Y']);
            $this->data['all_institutes']   = $this->Frontmodel->get_result_data('institute', ['is_active' => 'Y']);
            $this->data['all_bloodgroups']  = $this->Frontmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
            $this->data['all_hostels']      = $this->Frontmodel->get_result_data('hostel', ['is_active' => '1']);
            $this->data['all_states']       = $this->Frontmodel->get_result_data('state', ['is_active' => 'Y']);
            $this->data['all_data']         = $this->Frontmodel->load_student_payment_details($user_id);
            $this->data['complaint_types']  = $this->Frontmodel->get_result_data('complaint_type');
            $this->data['payment_options']  = $this->Frontmodel->get_result_data('payment_options', ['is_active' => '1']);
            $this->data['payment_option_for_reissue']  = $this->Frontmodel->get_row_data('payment_options', ['id' => 7]);

            //current semester payment ===============
            $first_payment_status = $this->Frontmodel->getPaymentStatus($student_details->id);
             $this->data['current_sem']  = (count($first_payment_status) + $student_details->semester);
            $this->middle                   = 'front/student-profile';
            $this->layout();
        }
        else
        {
            redirect(base_url(''));
        }
       

    }

    // sbi_payment
    public function addpayment() {
        $user_id = $this->session->userdata("userid"); 
        if ($this->input->post()) {
            $amount = $this->input->post('total_paid');
            $student_id =  $this->input->post('student_id');
            $response = $this->algorithm($amount,$student_id);
            $ref_id = $response['ref_id'];
            $flg = $this->Frontmodel->addpayment($user_id,$ref_id);

            if($flg){
                 return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(array(
                                'res' => 'success',
                                'encstring' => $response['encstring'],
                                'merchant_code' => 'VISVA_BHARATI'
                        )));
            }else{
                redirect('student-profile');
            }

        }

    }


    public function addcomplaint() {
       $user_id            = $this->session->userdata("userid"); 
       $flg = $this->Frontmodel->addcomplaint($user_id);
       echo $flg; exit();
    }


    public function studentpaymentdetails($payment_id) {
        $payment_details                = $this->Frontmodel->get_row_data('payment_details', ['ref_id' => $payment_id]); //sbi_payment change in id to ref_id

        $this->data                     = array();
        $this->data['student_details']  = $this->Frontmodel->load_all_student_data($payment_details->student_id);
        $this->data['payment_details']  = $payment_details;

        $this->middle                   = 'front/student-payment-details';
        $this->layout();
    }


    public function noticedetails() {
        $notice_details                 = $this->db->select('*')->where('is_active','1')->order_by('id','desc')->get('notice')->result();

        $this->data                     = array();
        $this->data['notice_details']   = $notice_details;

        $this->middle                   = 'front/notice-details';
        $this->layout();
    }


    public function studentform() {
        $this->data = array();
        $this->data['all_courses'] = $this->Frontmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments'] = $this->Frontmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes'] = $this->Frontmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states'] = $this->Frontmodel->get_result_state('state', ['is_active' => 'Y']);
        $this->data['all_countries'] = $this->Frontmodel->get_result_state('countries', ['is_active' => 1]);
        $this->data['all_bloodgroups'] = $this->Frontmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
        $this->data['all_hostels'] = $this->Frontmodel->get_result_data('hostel', ['is_active' => '1']);
        $this->data['list'] = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'rules-and-regulations']);   

        $this->middle = 'front/student-form';
        $this->layout();
    }

    public function addstudentprofile() {
        $flg = $this->Frontmodel->modify();
        if($flg == 'error') {
            show_error("Please try again", 400, 'Sorry: something went wrong!');
        } else {
            redirect('student-submitted-form/'.$flg);
        }
    }


    public function studentsubmittedform($user_id) {
        $this->data = array();
        $this->data['user_id'] = $user_id;
        $this->data['student_details'] = $this->Frontmodel->load_all_student_data($user_id);
        $this->data['payment_options'] = $this->Frontmodel->get_row_data('payment_options', ['id' => 5]);

        if(isset($_POST['pay_fee'])){
            $payment_token = $_POST['student_id'].time();
            $save = array(
                'student_id' => $_POST['student_id'],
                'total_amount' => $_POST['application_amount'],
                'total_paid' => $_POST['application_amount'],
                'total_overdue' => '0.00',
                'form_type' => 'application_fee',
                'payment_details' => '',
                'payment_status' => '1',
                'payment_token' =>$payment_token
            );

            $this->db->insert(tablename('payment_details'), $save);
            $pay_id = $this->db->insert_id();
            redirect('student-payment/'.$_POST['student_id'].'/'.$payment_token);
        }

        $this->middle = 'front/student-submitted-form';
        $this->layout();
    }


    public function reissuepayment() {
        $user_id                = $this->session->userdata("userid"); 
        $this->data             = array();
        $this->data['user_id']  = $user_id;

        $reissue_amount      = $this->input->post('reissue_amount');
        
        if(isset($reissue_amount)){
            $payment_token = $user_id.time();
            $save = array(             
                'student_id'            => $user_id,
                'total_amount'          => $reissue_amount,
                'total_paid'            => $reissue_amount,
                'total_overdue'         => '0.00',
                'form_type'             => 'reissue_fee',
                'payment_details'       => '',
                'payment_status'        => '1',
                'payment_token'         =>$payment_token
            );
            $this->db->insert(tablename('payment_details'), $save);
            $pay_id = $this->db->insert_id();

            echo true;
        }
        echo false;
    }


     public function addreissueidcard() {
       $user_id = $this->session->userdata("userid"); 

        if ($this->input->post()) {
            $flg = $this->Frontmodel->reissuecard($user_id);
        }

        $this->data = array();
        $id = $user_id;

        $this->data['student_details']  = $this->db->select('student.*, hostel.hostel_name as hostel_name_name, hostel_floor.floor_name, hostel_block.block_name')->join('hostel','hostel.id = student.hostel_name','left')->join('hostel_block','hostel_block.id = student.block_no','left')->join('hostel_floor','hostel_floor.id = student.floor_no','left')->where('student.id',$id)->get('student')->row();

        $this->data['all_courses']      = $this->Frontmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Frontmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Frontmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_bloodgroups']  = $this->Frontmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);

        $this->data['all_hostels']      = $this->Frontmodel->get_result_data('hostel', ['is_active' => '1']);

        $this->data['complaint_types']  = $this->Frontmodel->get_result_data('complaint_type');
        $this->data['payment_options']  = $this->Frontmodel->get_result_data('payment_options', ['is_active' => '1']);

        $this->data['payment_option_for_reissue']  = $this->Frontmodel->get_row_data('payment_options', ['id' => 7]);
        $this->data['all_states']       = $this->Frontmodel->get_result_data('state', ['is_active' => 'Y']);
        $this->data['all_data']         = $this->Frontmodel->load_student_payment_details($user_id);
        $this->middle                   = 'front/student-profile';
        $this->layout();
    }

    function send_email($to, $subject, $data) {
        $config['protocol'] = 'mail';
        $config['smtp_host'] = "mail.visvabharati-hostel.com";
        $config['smtp_crypto'] = 'tls';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'info@visvabharati-hostel.com';
        $config['smtp_pass'] = 'f(6ZoaJ2C~E3';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $CI = & get_instance();
        $CI->load->library('email');
        $CI->email->initialize($config);
        $CI->email->from('info@visvabharati-hostel.com', 'Visvabharati');
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($data);
        $CI->email->send();
    }

     public function studentpayment($user_id,$payment_id) {
        $this->data                     = array();
        $this->data['user_id']  = $user_id;
        $this->data['payment_id']  = 00000;
        $this->data['student_details']  = $this->Frontmodel->load_all_student_data($user_id);
        $this->middle                   = 'front/student-payment';
        $this->layout();
    }

     public function studentpaymentWithOutAppFee($user_id) {
        $data = array();
        $data['user_id']  = $user_id;
        $data['payment_id']  = 00000;
        $data['student_details']  = $this->Frontmodel->load_all_student_data($user_id);
        $state_id = $data['student_details']->state_id;
        $state = $this->db->select('*')->where('id',$state_id)->get('state')->row();

        if(!empty($state)){
            $data['state_name'] = $state->name;
        }else{
            $data['state_name'] = "";
        }

        $email_message = $this->load->view('front/download-student-form', $data, TRUE);
        $this->send_email($data['student_details']->email_id, "Visvabharati Hostel Application", $email_message);
        $this->send_email("vbhostel@visva-bharati.ac.in", $data['student_details']->full_name, $email_message);

        $this->data = array();
        $this->data['user_id']  = $user_id;
        $this->data['payment_id']  ='';
        $this->data['student_details']  = $this->Frontmodel->load_all_student_data($user_id);

        $this->middle = 'front/student-payment';
        $this->layout();
    }

    public function updatestudentprofile() {
        $user_id = $this->session->userdata("userid");

        if ($this->input->post()) {
            $flg = $this->Frontmodel->modify($user_id);
            redirect('edit-student-profile');
        }

        $this->data = array();
        $id = $user_id;

        $this->data['student_details']  = $this->db->select('student.*, hostel.hostel_name as hostel_name_name, hostel_floor.floor_name, hostel_block.block_name')->join('hostel','hostel.id = student.hostel_name','left')->join('hostel_block','hostel_block.id = student.block_no','left')->join('hostel_floor','hostel_floor.id = student.floor_no','left')->where('student.id',$id)->get('student')->row();

        $this->data['all_courses']      = $this->Frontmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Frontmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Frontmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_bloodgroups']  = $this->Frontmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);

        $this->data['all_hostels']      = $this->Frontmodel->get_result_data('hostel', ['is_active' => '1']);
        $this->data['all_states']       = $this->Frontmodel->get_result_data('state', ['is_active' => 'Y']);
        $this->data['all_data']         = $this->Frontmodel->load_student_payment_details($user_id);
        $this->data['complaint_types']  = $this->Frontmodel->get_result_data('complaint_type');
        $this->data['payment_options']  = $this->Frontmodel->get_result_data('payment_options', ['is_active' => '1']);
        $this->data['payment_option_for_reissue']  = $this->Frontmodel->get_row_data('payment_options', ['id' => 7]);

        $this->middle = 'front/student-profile';
        $this->layout();
    }



    public function about() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'about']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }

    public function contact_us() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'contact-us']);
        $this->middle                           = 'front/contact_cms';
        $this->layout();
    }
  
    public function administration() {
        $this->data   = array();
        $this->data['administration_data']      = $this->Frontmodel->get_result_data('administration',['is_active' => '1']);

        $this->middle = 'front/administration';
        $this->layout();
    }


    public function cmsdetails($page_type) {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => $page_type]);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }


    public function rulesandregulations() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'rules-and-regulations']);   
        $this->middle                           = 'front/rules_and_regulations';//@sudip
        $this->layout();
    }

    //@sudip
    public function hostelallotment() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'hostel-admission-procedures']);  
        $this->middle                           = 'front/hostel_admission_procedures'; 
        $this->layout();
    }

    public function admission() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'hostel-admission-procedures']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }

    public function hostels() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'hostel']);
        $this->middle                           = 'front/hostel';
        $this->layout();
    }

    public function hostellisting($hostel_type) {
        $this->data                    = array();
        $hostel_details                = $this->Frontmodel->load_all_hostel_data($hostel_type);
        $this->data['hostel_details']  = $hostel_details;

        $this->middle                   = 'front/hostel_details';
        $this->layout();
    }

    public function contactus() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'contact-us']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }

    public function admissioneligibility() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'admission-eligibility']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }

    public function seatdistribution() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'seat-distribution']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }

    public function readmission() {
        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'readmission']);
        $this->middle                           = 'front/common_cms_page';
        $this->layout();
    }


    public function seatcancellation() {

        $this->data                             = array();
        $this->data['list']                     = $this->Frontmodel->get_result_data('cms', ['cms_slug' => 'cancellation-of-hostel-admission']);

        $this->middle                           = 'front/seat_cancellation';
        $this->layout();
    }
     public function hostel_details() {

        $id   = $this->input->post('id');
        $data = $this->Frontmodel->get_row_result('hostel', ['id' => $id]);
      
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }





    public function check_otp($user_id) {
        //echo $user_id;
        //echo "<pre>"; print_r($_POST); die;
        $data = $this->Frontmodel->get_row_result('student', ['id' => $user_id]);
        if($data->otp_code===$_POST['otpval']){
            // save and confirm otp
            $update = array(
                'otp_code'            => '',
                'otp_confirm'         => 1,
                'status'              => 1
            );
            $this->db->where('id', $user_id)->update(tablename('student'), $update);
            echo "done"; exit();
        }else{
            echo "OTP dosen't match"; exit();
        }

    }
/**************** 25.09.18 *****************/

public function check_bhavanCode()
    {
        //echo "<pre>"; print_r($_POST); die;
        if($_POST['st1']!=0){
            $bhavan_code = $_POST['st1'].''.$_POST['st2'];
        }else{
            $bhavan_code = $_POST['st2'];
        }
       //echo "<pre>"; print_r($bhavan_code); die;
        $bhavan = $this->db->select('*')->where('institute_code',$bhavan_code)->get('institute')->row();
        //echo $this->db->last_query()   ;

        if(!empty($bhavan)){
            echo $bhavan->id.'##'.$bhavan_code; exit();
        }else{
            echo "0"; exit();
        }

    }


    public function check_courseType()
    {
        //echo "<pre>"; print_r($_POST); die;
        if($_POST['st3']!=0){
            $course_id = $_POST['st3'].''.$_POST['st4'];
        }else{
            $course_id = $_POST['st4'];
        }
        $course = $this->db->select('*')->where('course_code',$course_id)->where('institute_id',$_POST['institute_id'])->get('course')->row();
//echo "<pre>"; print_r($course); die;

        if(!empty($course)){
            echo $course->id.'##'.$course_id; exit();
        }else{
            echo "0"; exit();
        }

    }



    public function check_Department()
    {
        //echo "<pre>"; print_r($_POST); die;
        $var  = $_POST['st5'].''.$_POST['st6'].''.$_POST['st7'];
        $subject_code = (int)$var; 
       $department = $this->db->select('*')->where('subject_code',$subject_code)->where('course_id',$_POST['course_id'])->where('institute_id',$_POST['institute_id'])->get('department')->row();
//echo "<pre>"; print_r($department); die;

        if(!empty($department)){
            echo $department->id.'##'.$subject_code; exit();
        }else{
            echo "0"; exit();
        }

    }




    public function printSlip($id='')
    {
        $user_id                            = $this->session->userdata("userid"); 

        if($user_id)
        {
        $data  = array();
        $data['payment_details'] = $this->Frontmodel->get_payment_details(base64_decode($id));
        $data['price_word'] =  $this->priceinwords($data['payment_details']->total_amount);
        //echo "<pre>"; print_r($data['payment_details']); 

        $this->load->view('front/receiptPrint',$data);
        }else{
            redirect(base_url());
        }
    }

    public function printAppSlip($id='')
    {
        $user_id                            = $this->session->userdata("userid"); 

        if($user_id)
        {
            $data  = array();
        $data['payment_details'] = $this->Frontmodel->get_payment_details(base64_decode($id));

        $data['price_word'] =  $this->priceinwords(@$data['payment_details']->total_amount);
        //echo "<pre>"; print_r($data['payment_details']); 

        $this->load->view('front/receiptAppPrint',$data);
        }else{
            redirect(base_url());
        }
        
    }
	public function printHosSlip($id='')
    {
        $user_id                            = $this->session->userdata("userid"); 

        if($user_id)
        {
            $data  = array();
        $data['payment_details'] = $this->Frontmodel->get_payment_details(base64_decode($id));

        $data['price_word'] =  $this->priceinwords(@$data['payment_details']->total_amount);
        echo "<pre>"; print_r($data['payment_details']); 

        $this->load->view('front/receiptHosPrint',$data);
        }else{
            redirect(base_url());
        }
        
    }


    public function priceinwords($number){
         
   $no = floor($number);
   $point = substr(strrchr($number, "."), 1);
   $hundred = null;
   $digits_1 = strlen($no);

   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point>0) ?
    "Point " . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return ucwords($result) . "" . ucwords($points)." Only";
    }



    public function check_student_id()
    {
        $student_id= $this->input->post('student_id'); 
        $student = $this->Frontmodel->get_row_data('student', ['student_id' => $student_id, 'status' => 1]);
        if(!empty($student))
        {
            echo 'false'; exit();
        }
        else
        {
            echo 'true'; exit();
        }
    }

    


    public function response_sbi(){
        if(isset($_REQUEST))
        print_r($_REQUEST);die();
        
    }           

    // public function sms_test(){
    //     $message = 'LIVE TEST SMS';
    //     $ch     = curl_init();  
    //     curl_setopt($ch,CURLOPT_URL,'http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=919733611035&source=VBHSTL&message='.urlencode($message));
    //     // curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //     // curl_setopt($ch,CURLOPT_HEADER, true);  
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    //     curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 0 );    
    //     $output = curl_exec($ch);
    //     curl_close($ch); 

    //     echo 'SMS'; print_r($output);die();

    // }



    function sbi_encrypt($data) {
       $key            = file_get_contents("https://www.visvabharati-hostel.com/assets/VISVA_BHARATI.KEY", true);
       $iv             = '1234567890123456';
       $encrypted = openssl_encrypt($data, 'AES-128-CBC', $key, 0, $iv);
       return $encrypted;
    }

    function sbi_decrypt($data) {
        $iv             = '1234567890123456';
        $key            = file_get_contents("https://www.visvabharati-hostel.com/assets/VISVA_BHARATI.KEY", true);
       return openssl_decrypt($data, 'AES-128-CBC', $key, 0, $iv);
       
    }

    public function algorithm_AES(){ 
        $ref_id = time();
        $amount = 1;
        $returnurl = 'https://www.visvabharati-hostel.com';
        // $requiredData = "ref_id=$ref_id|amount=$amount";
        $requiredData = "ref_id=$ref_id|amount=$amount|returnurl=$returnurl";
        $checkSum=md5($requiredData);
        // echo $ref_id; echo '<br>';
        $encstring = $this->sbi_encrypt("$requiredData|checkSum=$checkSum");
        // echo $encstring; echo '<br>';
        // $decString = $this->sbi_decrypt($encstring);
        // echo $decString;die();

        $this->data                             = array();
        $this->data['ref_id']                   = $ref_id;
        $this->data['amount']                   = $amount;
        $this->data['checkSum']                 = $checkSum;
        $this->data['encstring']                = $encstring;
        $this->data['merchant_code']            = 'VISVA_BHARATI';
        $this->middle                           = 'front/payment';
        $this->layout();
    }

    public function algorithm($amount){ 
        $ref_id = time();
        $returnurl = 'https://www.visvabharati-hostel.com';
        $requiredData = "ref_id=$ref_id|amount=$amount|returnurl=$returnurl";
        $checkSum=md5($requiredData);

        $student_id = $this->session->userdata("userid");//change in 23092019
        log_message('info', "state: 1st state initial, student id: $student_id, ref_id: $ref_id, amount: $amount, check sum: $checkSum desc: start");

        $encstring = $this->sbi_encrypt("$requiredData|checkSum=$checkSum");

        log_message('info', "state: 2nd state initial, student id: $student_id, ref_id: $ref_id,  encstring: $encstring, desc: process to payment page");

        $data['encstring'] = $encstring;
        $data['ref_id'] = $ref_id;

        return $data;
    }

    public function thankyou(){
        if(isset($_POST)){
            $decrypt = $_POST['encdata'];
            $user_id = $this->session->userdata("userid");
            log_message('info', "state: 3rd state thankyou Prod Transactions, student id: $user_id, decrypt: $decrypt , desc: just redirect return url");
            $decString = $this->sbi_decrypt($decrypt);
            $decArr = explode("|",$decString);
            log_message('info', "state: 4rd state thankyou Prod Transactions, student id: $user_id, $decArr[0], $decArr[1], $decArr[2],$decArr[3], $decArr[4], $decArr[5],  $decArr[6] desc: payment details");

            $hash_map = array();
            foreach ( $decArr as $elem ) {
               $key_val = explode("=", $elem);
               $hash_map[strtolower($key_val[0])] = $key_val[1];
            }
           $transaction_id = $hash_map['transaction_id'];
           $amount = $hash_map['amount'];
           $ref_id = $hash_map['ref_id'];
           $status = $hash_map['status'];
           $desc = $hash_map['desc'];
           $transactiontime_date = $hash_map['transactiontime_date'];
           $checkSum = $hash_map['checksum'];

            if($status == 'Success'){

                //double verification using SBI doc===================================================START 

                $requiredData = "ref_id=$ref_id|amount=$amount";
                $checkSum = md5($requiredData);
                $encdata = $this->sbi_encrypt("$requiredData|checkSum=$checkSum");

                // $url = 'https://uatmerchant.onlinesbi.com/thirdparties/doubleverification.htm'; //TEST
                $url = 'https://merchant.onlinesbi.com/thirdparties/doubleverification.htm'; //LIVE
                $data = array('merchant_code' => 'VISVA_BHARATI', 'encdata'=> $encdata);

                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                    )
                );
                
                $result="";
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);

                if ($result === FALSE) {
                    $result = $this->Frontmodel->delete_temp_payment($user_id,$ref_id); 
                    if($result){
                    log_message('info', "state: 6rd state failure Double Verification, student id: $user_id, desc: updated in database");
                   }else{
                    log_message('info', "state: 6rd state failure Double Verification, student id: $user_id, desc: not updated in database");
                   }
                    redirect('student-profile');
                }else{

                log_message('info', "state: 6rd state thankyou Double Verification, student id: $user_id, decrypt: $result , desc: just redirect return url");
                $decString = $this->sbi_decrypt($result);
                $decArrDouble = explode("|",$decString);
                log_message('info', "state: 7rd state thankyou Double Verification, student id: $user_id, $decArrDouble[0], $decArrDouble[1], $decArrDouble[2],$decArrDouble[3], $decArrDouble[4], $decArrDouble[5] desc: payment details");

                $hash_map_double = array();
                foreach ( $decArrDouble as $element ) {
                   $keyVal = explode("=", $element);
                   $hash_map_double[strtolower($keyVal[0])] = $keyVal[1];
                }
               $transaction_id_double = $hash_map_double['transaction_id'];
               $amount_double = $hash_map_double['amount'];
               $ref_id_double = $hash_map_double['ref_id'];
               $status_double = $hash_map_double['status'];
               $desc_double = $hash_map_double['desc'];
               $checkSum_double = $hash_map_double['checksum'];

                if($status_double == 'Success'){
                        $result = $this->Frontmodel->update_payment_status($user_id,$ref_id,$transaction_id,$result); 
                    if($result){
                        log_message('info', "state: 8rd state success Double Verification, student id: $user_id, $decArrDouble[0], $decArrDouble[1], $decArrDouble[2],$decArrDouble[3], $decArrDouble[4], $decArrDouble[5] desc: updated in database");
                    }else{
                        log_message('info', "state: 8rd state success Double Verification, student id: $user_id, $decArrDouble[0], $decArrDouble[1], $decArrDouble[2],$decArrDouble[3], $decArrDouble[4], $decArrDouble[5] desc: not updated in database");
                    }
                    redirect('student-payment-details/'.$ref_id);
                }else{
                     $result = $this->Frontmodel->delete_temp_payment($user_id,$ref_id); 
                    if($result){
                    log_message('info', "state: 8rd state failure Double Verification, student id: $user_id, desc: updated in database");
                   }else{
                    log_message('info', "state: 8rd state failure Double Verification, student id: $user_id, desc: not updated in database");
                   }
                    redirect('student-profile');
                }

            }
            //double verification using SBI doc===================================================END
               
            }else{
                $result = $this->Frontmodel->delete_temp_payment($user_id,$ref_id); 
                if($result){
                log_message('info', "state: 5rd state failure Prod Transactions, student id: $user_id, desc: updated in database");
               }else{
                log_message('info', "state: 5rd state failure Prod Transactions, student id: $user_id, desc: not updated in database");
               }
                redirect('student-profile');
            }
        }
    }

    public function payment_cancel(){
        if(isset($_POST)){
            $decrypt = $_POST['encdata'];
            $decString = $this->sbi_decrypt($decrypt);
            $decArr = explode("|",$decString);
            
            $hash_map = array();
            foreach ($decArr as $value) {
                $key_val = explode("=",$value);
                $hash_map[strtolower($key_val[0])] = $key_val[1];
            }

            $ref_id = $hash_map['ref_id'];
            $status = $hash_map['status'];
            $transaction_id = $hash_map['transaction_id'];
            $amount = $hash_map['amount'];

            $user_id = $this->session->userdata("userid");

            log_message('info', "state: 5rd state cancel, student id: $user_id, decrypt: $decrypt , desc: just redirect return url");

            if($status == 'Failure'){
                // sbi_payment
               $result = $this->Frontmodel->delete_temp_payment($user_id,$ref_id);
               if($result){
                log_message('info', "state: 6rd state cancel, student id: $user_id, $decArr[0], $decArr[1], $decArr[2],$decArr[3], desc: updated in database");
               }else{
                log_message('info', "state: 6rd state cancel, student id: $user_id, $decArr[0], $decArr[1], $decArr[2],$decArr[3], desc: not updated in database");
               }
               
            }
            redirect('student-profile');
        }
    }


    public function download_student($user_id,$payment_id){
        $data = array();
        $data['user_id']  = $user_id;
        $data['payment_id']  = $payment_id;

        $data['student_details']  = $this->Frontmodel->load_all_student_data($user_id);

        $state_id = $data['student_details']->state_id;

        $state = $this->db->select('*')->where('id',$state_id)->get('state')->row();

        if(!empty($state)){
            $data['state_name'] = $state->name;
        }else{
            $data['state_name'] = "";
        }

        $this->load->view('front/download-student-form',$data);
    }

    public function print_hos_payment_invoice($paymentId,$sem,$index){
        $invoice_details  = $this->Frontmodel->hos_payment_invoice_details($paymentId);
        $data['invoice_details']  = $invoice_details;
        $data['semister']  = $sem;
        $data['index']  = $index;
        // print_r($data);die();
        $this->load->view('front/hos-payment-invoice',$data);
    }


    public function add_message(){
            if($_POST){
                $to = 'vbhostel@visva-bharati.ac.in';
                $subject = $_POST['subject'];
                $headers = "From: " . strip_tags($_POST['email_id']) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = '<html><body>';
                $message .= "<strong>Subject:</strong> <i>" . strip_tags($_POST['subject']) . "</i><br>";
                $message .= "<p>". strip_tags($_POST['message']) ."</p><br>";
                $message .= "<strong>Name:</strong> " . strip_tags($_POST['name']) . "<br>";
                $message .= "<strong>Email:</strong> " . strip_tags($_POST['email_id']) . "<br>";
                $message .= "<strong>Contact No.:</strong> " . strip_tags($_POST['contact_number']) . "<br>";
                $message .= "<strong>Date:</strong> " . date('d/m/Y') . "<br>";
                $message .= "</body></html>";
                // mail($to, $subject, $message, $headers);

                $data['body']=$message;
                send_email($to,$subject,$data);
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'res' => 'success',
                            'text' => '200',
                            
                    )));
            }
    }


    public function download_details(){
        $this->data                             = array();
        $this->middle                           = 'front/download-details';
        $this->layout();
    }

    public function duePayment(){
        $stuId = $_POST['stuId'];
        $stuPhone = $_POST['stuPhone'];
        $smsText = $_POST['smsText'];
        $message = $smsText;
        $ch     = curl_init();  
        curl_setopt($ch,CURLOPT_URL,'http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=91'.$stuPhone.'&source=VBHSTL&message='.urlencode($message));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 0 );    
        $output = curl_exec($ch);
        curl_close($ch); 
        
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                            'res' => 'success',
                            'text' => '200',
                            'data' => $smsText
                            
                    )));
    }

    public function editStudent() {

        $id = $this->session->userdata("userid");
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
                $this->data['religions']  = $this->Allotmentmodel->get_result_data('religions');
                $this->middle                   = 'front/edit_student';
                $this->layout();
            }
        }
    }

    public function modifyStudentInfo($id) {
        $flg = $this->Allotmentmodel->update($id);
        if($flg) {
            redirect('edit-profile');
        } else {
            show_error("Please try again", 400, 'Sorry: something went wrong!');
        }
    }


    public function change_password() {
       $user_id = $this->session->userdata("userid");
       $msg="Password Successfully Changed";
       if($this->input->post())
       {

           $flg = $this->Authmodel->modify_passwod($user_id);
           if (!empty($flg)) 
           {
               $this->session->set_flashdata('successmessage', $msg);
           }
           else 
           {
               $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
           }
           $redirect = base_url('/');
           redirect($redirect);
       }

   }

   public function studentPaymentDashboard(){
        $user_id = $this->session->userdata("userid"); 
        if($user_id){
            $this->data                     = array();
            $id                             = $user_id;
            $room_fee_charge                = 0.00;

            $student_details  = $this->db->select('student.*, hostel.hostel_name as hostel_name_name, hostel_floor.floor_name, hostel_block.block_name,course.course_name,course.total_year')->join('hostel','hostel.id = student.hostel_name','left')->join('hostel_block','hostel_block.id = student.block_no','left')->join('hostel_floor','hostel_floor.id = student.floor_no','left')->join('course','course.id = student.course_id','left')->where('student.id',$id)->get('student')->row();

            $this->data['payment_options']  = $this->Frontmodel->get_result_data('payment_options', ['is_active' => '1']);

            $room_fee_hostel  = $this->db->select('*')->where('hostel_id',@$student_details->hostel_name)->where('block_id',@$student_details->block_no)->where('floor_id',@$student_details->floor_no)->where('room_no',@$student_details->room_no)->get('hostel_rooms_seats')->row();

            if(strtolower(@$student_details->nationality_type=='indian')){

                if((@$student_details->caste_type=='SC' || @$student_details->caste_type=='ST' || @$student_details->pwd_status == 1) && @$student_details->course_name !='Ph.D' ){
                $room_fee_charge = 0;
                }else{
                    $room_fee_charge = $room_fee_hostel->room_fee;
                }

            }else{
                $room_fee_charge = $room_fee_hostel->room_fee_foreigner;
            }

            $first_payment_status = $this->Frontmodel->getPaymentStatus($student_details->id);
            if(count($first_payment_status) != 0){
                $this->data['payment_options']  = array();
            }else{
                $this->data['payment_options']  = $this->Frontmodel->get_result_data('payment_options', ['is_active' => '1']);
            }
            $room_fee_hostel  = $this->db->select('*')->where('hostel_id',@$student_details->hostel_name)->where('block_id',@$student_details->block_no)->where('floor_id',@$student_details->floor_no)->where('room_no',@$student_details->room_no)->get('hostel_rooms_seats')->row();

            $this->data['student_details']  =$student_details;
            $this->data['room_fee_hostel']  =$room_fee_hostel;
            $this->data['room_fee_charge']  =$room_fee_charge;
            $this->data['payment_number']  = count($first_payment_status);
            $this->data['current_sem']  = (count($first_payment_status) + $student_details->semester);
            $this->middle  = 'front/student-payment-dashboard';
            $this->layout();
        }else{
            redirect('');
        }
       
    }



}

/* End of file front.php */
/* Location: ./application/controllers/Front.php */