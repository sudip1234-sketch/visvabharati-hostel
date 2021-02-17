<?php
class Frontmodel extends CI_Model {

    /**
     * The constructor method of this class.
     *
     * @access  public
     * @param none
     * @return  Loads all the method, helper, library etc. required throughout this class
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
        $this->load->helper('string','email_helper');
    }

    public function get_row_result($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }


    public function load_main_menus() {
        $this->db->select('cms.*');
        $this->db->from(tablename('cms')." as cms"); 
        $this->db->where('cms.parent_id', '0');
        $this->db->where('cms.is_active', '1');
        $this->db->order_by('cms.set_order', 'asc');
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }




    public function load_all_student_data($id) {
       $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");
        $this->db->where('st.id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


     public function load_student_hostel_details($id) {
        $this->db->select('st.*,hst.hostel_name,ad.email');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('hostel')." as hst","hst.id = st.hostel_name");
        $this->db->join(tablename('administration')." as ad","ad.id = hst.hostel_warden_id");
        $this->db->where('st.student_id',$id);

        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


      public function load_student_payment_details($id) {
        $this->db->select('pd.id,pd.form_type,pd.total_amount,pd.total_paid,pd.total_overdue,pd.payment_date,st.academic_year,st.vacating_year,hst.hostel_name,pd.student_id as studentid,st.semester
            ');
        $this->db->from(tablename('payment_details')." as pd");
        $this->db->join(tablename('student')." as st","st.id = pd.student_id");
        $this->db->join(tablename('hostel')." as hst","hst.id = st.hostel_name");
        $this->db->where('pd.student_id',$id);
        $this->db->where('pd.sbi_payment_status',1);
        $query = $this->db->get();
        $result = $query->result();
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    function isunique($where) {
        $c = $this->db->where($where)->count_all_results(tablename('student'));
        return $c === 0 ? TRUE : FALSE;
    }


    public function get_result_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    public function get_result_state($table, $where = "1=1") {
        $query = $this->db->order_by("name", "asc")->get_where(tablename($table), $where);
        return $query->result();
    }

    public function get_student_last_sl_no($institute_id,$course_id,$department_id) {
        $query = $this->db->query("SELECT * FROM `vb_student` WHERE institute_id =".$institute_id." 
        AND course_id =".$course_id." 
        AND department_id =".$department_id." 
        ORDER BY student_id DESC LIMIT 1");
        $result = $query->result();
        if($result) {
            return $result[0]->student_id;
        } else {
            return 0;
        }
    }

    public function get_row_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

     public function load_settings($where) {
        $query = $this->db->get_where(tablename('settings'), $where);
        return $query->row();
    }

    public function reissuecard($id = '') {
        $reissue_amount      = $this->input->post('reissue_amount');
        if(isset($reissue_amount)){
            $payment_token = $id.time();
            $save = array(             
                'student_id'            => $id,
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
        }

        $this->db->select('rsc.*');
        $this->db->from(tablename('reissue_student_card')." as rsc");
        $this->db->where('rsc.student_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        $reissue_reason = $this->input->post('reissue_reason');

        if(!empty($_FILES['reissue_image']['name'])) {
            $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/reissue_doc/';
            $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 

            $this->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
            $this->upload->initialize($config);

            if($_FILES['reissue_image']['error']==0) {
                $picName=$_FILES['reissue_image']['name']; 
                $ext = end((explode(".", $_FILES['reissue_image']['name'])));
                 // generate a unique file name
                $rand = md5(uniqid($picName, true));
                $newPicName=$rand.'.'.$ext;
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($_FILES['reissue_image']['tmp_name'] ,$destination)) {
                    $image_name = $newPicName;
                }
            }
        }

        if(!empty($result) && $result->reissue_count > 0) {
            $reissue_count = $result->reissue_count + 1;
            $data = array(
                'reissue_count'         => $reissue_count,
                'reason'                => $reissue_reason,
                'image'                 => $image_name,
                'reissue_date'          => date('Y-m-d H:i:s'),
                'is_new'                => 1,
                'is_issued'             => 0
            );

            $this->db->where('student_id', $id)->update(tablename('reissue_student_card'), $data);
            return $id;
        } else {
             $data = array(
            'student_id'            => $id,
            'reissue_count'         => 1,
            'reason'                => $reissue_reason,
            'image'                 => $image_name,
            'reissue_date'          => date('Y-m-d H:i:s'),
            'is_new'                => 1,
            'is_issued'             => 0
           
            );
            $this->db->insert(tablename('reissue_student_card'), $data);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    public function modify() {

        $six_digit_random_number = mt_rand(100000, 999999);

        $stu_first_no = $this->input->post('student_id');
        $student_id = $this->input->post('student_id');

        if(!preg_match('/^(F)?([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})$/', $student_id, $matches)) {
            return 'error';
        }

        $full_name                  = $this->input->post('full_name');
        $contact_no                 = $this->input->post('contact_no');
        $email_id                   = $this->input->post('email_id');
        $university_id              = $this->input->post('university_id');
        $hostel_id                  = $this->input->post('hostel_id');
        $gender                     = $this->input->post('gender'); 
        $course_id                  = $this->input->post('course_id');
        $department_id              = $this->input->post('department_id');
        $institute_id               = $this->input->post('institute_id');
        $date_of_allotment          = $this->input->post('date_of_allotment');
        $vb_reg_id                  = $this->input->post('vb_reg_id');
        $date_of_birth              = $this->input->post('date_of_birth');
        $aadhar_card_no             = $this->input->post('aadhar_card_no');
        $state_id                   = $this->input->post('state_id');
        $address                    = $this->input->post('address');
        $city                       = $this->input->post('city');
        $pincode                    = $this->input->post('pincode');
        $guardian_name              = $this->input->post('guardian_name');
        $relation_with_guardian     = $this->input->post('relation_with_guardian');
        $guardian_contact_no        = $this->input->post('guardian_contact_no');
        $guardian_email_id          = $this->input->post('guardian_email_id');
        $guardian_address           = $this->input->post('guardian_address');
        $pwd_status                 = $this->input->post('pwd_status');
        $physically_challenged      = $this->input->post('physically_challenged');
        $caste_type                 = $this->input->post('caste_type');
        $last_final_exam_score      = $this->input->post('last_final_exam_score');
        $distance_frm               = $this->input->post('distance_frm');
        $final_score                = $this->input->post('final_score_validation');
        $distance_score             = $this->input->post('distance_score_validation');
        $blood_group                = $this->input->post('blood_group');
        $nationality_type           = $this->input->post('nationality_type');
        $cgpa_score_card            = $this->input->post('cgpa_score_card');
        $identification_card        = $this->input->post('identification_card');
        $other_caste_card           = $this->input->post('other_caste_card');
        $renewal_option             = $this->input->post('renewal_option');
        $hostel_name                = ($this->input->post('renewal_option') == 1)? $this->input->post('hostel_name'): 0;//@24062019
        $internal_student           = $this->input->post('internal_student');//@24062019
        $obtain_marks_type          = $this->input->post('obtain_marks_type');
        $vacating_month = $this->input->post('vacating_month');
        $vacating_year = $this->input->post('vacating_year');
        $semester = $this->input->post('semester');
        $district = $this->input->post('district');

        $profile_image_name         = $this->input->post('profile_image_name');
        $student_signature_name         = $this->input->post('student_signature_name');

        $institute_idd           = $this->input->post('institute_id_validation');
        $course_idd          = $this->input->post('course_id_validation');
        $department_idd             = $this->input->post('department_id_validation');

        if(empty($obtain_marks_type)) {
            $obtain_marks_type = 1;
        }

        $vacating_month = 6;
        $vacating_year = 2022;

        $data = array(
            'stu_first_no'          => $stu_first_no,
            'student_id'            => $student_id,
            'full_name'             => $full_name,
            'contact_no'            => $contact_no,
            'email_id'              => $email_id,
            'gender'                => $gender,
            'blood_group'           => $blood_group,
            'course_id'             => $course_idd,
            'department_id'         => $department_idd,
            'institute_id'          => $institute_idd,
            'date_of_allotment'     => date("Y-m-d H:i:s",strtotime($date_of_allotment)),
            'vacating_month'        => $vacating_month,
            'vacating_year'         => $vacating_year,
            'vb_reg_id'             => $vb_reg_id,
            'date_of_birth'         => date("Y-m-d H:i:s",strtotime($date_of_birth)),
            'aadhar_card_no'        => $aadhar_card_no,
            'state_id'              => $state_id,
            'address'               => $address,
            'city'                  => $city,
            'pincode'               => $pincode,
            'guardian_name'         => $guardian_name,
            'relation_with_guardian'=> $relation_with_guardian,
            'guardian_contact_no'   => $guardian_contact_no,
            'guardian_email_id'     => $guardian_email_id,
            'guardian_address'      => $guardian_address,
            'pwd_status'            => $pwd_status,
            'physically_challenged' => $physically_challenged,
            'caste_type'            => $caste_type,
            'last_final_exam_score' => $last_final_exam_score,
            'distance_frm'          => $distance_frm,
            'final_score'           => $final_score,
            'cgpa_score_card'       => $cgpa_score_card,
            'distance_score'        => $distance_score,
            'nationality_type'      => $nationality_type,
            'renewal_option'        => $renewal_option,
            'renew_hostel_code'     => $hostel_name, //24062019
            'internal_student'      => $internal_student, //24062019
            'obtain_marks_type'     => $obtain_marks_type,
            'is_approved'           => '0',
            'created_date'          => date('Y-m-d H:i:s'),
            'otp_code'              => $six_digit_random_number,
            'otp_confirm'           => '0',
            'semester'              => $semester,
            'district'              => $district,
            'vacating_month'        => $vacating_month,
            'vacating_year'         => $vacating_year
        );

        if(!empty($_FILES['profile_image']['name'])) {
            $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/student_pics/';
            $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 

            $this->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
            $this->upload->initialize($config);

            if($_FILES['profile_image']['error']==0) {
                $picName=$_FILES['profile_image']['name']; 
                $ext = end((explode(".", $_FILES['profile_image']['name'])));
                $rand = md5(uniqid($picName, true));
                $newPicName=$rand.'.'.$ext;
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'] ,$destination) ) {
                    $data['profile_image']= $newPicName;
                }
            }
        }

        if(!empty($_FILES['student_signature']['name'])) {
            $uploadPath4 =  $_SERVER['DOCUMENT_ROOT'].'/assets/student_signature/';
            $allowedTypes4 = 'gif|jpg|jpeg|png|bmp'; 

            $this->load->library('upload');
            $config['upload_path'] = $uploadPath4;
            $config['allowed_types'] = $allowedTypes4;
            $config['file_name'] = time();
            $this->upload->initialize($config);

            if($_FILES['student_signature']['error']==0) {
                $picName4=$_FILES['student_signature']['name']; 
                $ext4 = end((explode(".", $_FILES['student_signature']['name']))); 
                $rand4 = md5(uniqid($picName4, true));
                $newPicName4=$rand4.'.'.$ext4;
                $destination4=$uploadPath4.$newPicName4; 

                if (move_uploaded_file($_FILES['student_signature']['tmp_name'] ,$destination4)) {
                    $data['student_signature'] = $newPicName4;
                }
            }
        }

        $this->db->insert(tablename('student'), $data);
        $id = $this->db->insert_id();

        // set rank
        if(!empty($id)) {
            if(!empty($institute_idd)){
                $query_rank = $this->db->query("SELECT id,rank,final_score FROM `vb_student` WHERE `institute_id`=".$institute_idd." ORDER BY final_score DESC");
                $result_rank = $query_rank->result();
                $latest_rank = 1;
                if(!empty($result_rank))
                {
                    foreach ($result_rank as $value) {
                        $data_rank = array(
                                'rank' => $latest_rank
                            );
                       $this->db->where('id', $value->id)->update(tablename('student'), $data_rank);
                       $latest_rank++;
                    }
                }
            }

        // send sms
            $sms_content = 'OTP is '.$six_digit_random_number.' . Use this for complete your registration in Visvabharati';
            $timeout = 0;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=91".$contact_no."&source=VBHSTL&message=".urlencode($sms_content));

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
            $file_contents = curl_exec ( $ch );

            if (curl_errno ( $ch )) {
                echo curl_error ( $ch );
                curl_close ( $ch );
                exit ();
            }
            curl_close ( $ch );
            // end send sms
            
            // email send for OTP verification start
            $data['body']=$sms_content;
            $this->load->helper('email_helper');
            send_email($email_id,"VBHSTL OTP verification",$data);

            // email send for OTP verification end
            $subject = $this->input->post('subject');
            $score = $this->input->post('score');

            for($i=0;$i<count($subject);$i++)
            {
                $data = array();
                $data = array(
                    'student_id' => $id,
                    'subject' => $subject[$i],
                    'score' => $score[$i]
                );
                $this->db->insert(tablename('student_subject'), $data);
            }
        }
        return $id;
    }


    public function addcomplaint($id = '') {
        $complaint_type                 = $_POST['complaint_type'];
        $complaint_description          = $_POST['complaint_description'];

        if(!empty($id))
        {
            $this->db->select('*');
            $this->db->from(tablename('complaint_type'));
            $this->db->where('id', $complaint_type);

            $query1 = $this->db->get();
            $result1 = $query1->row();


            $this->db->select('*');
            $this->db->from(tablename('student'));
            $this->db->where('id', $id);

            $query = $this->db->get();
            $result = $query->row();

            $message          = '<html><body>
<table cellspacing="0" cellpadding="0" style="width: 700px; margin: 0 auto; border: 0;">
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 15px; background: #000;">
            <a href="#">
                <img src="<?php echo base_url().\'/assets/front/images/Visva_bharati_logo.jpg\'; ?>" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 25px 25px 0px 25px; background: #1a1819; color: #fff; font-family: sans-serif; font-size: 20px;">
            
        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 0 15px; font-family: sans-serif; font-size: 16px; color: #000; background: #eaeaea;">

            <table cellspacing="0" cellpadding="0" style="width: 600px; margin: 0 auto; border: 0; background: #fff;">
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Hello <i style="font-weight: 300; color: #444;">Admin</i>,
                    </td>
                </tr>

                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                       '.$result->full_name.' has lodged the following complaint:- 
                    </td>
                </tr>

                 <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                       Complaint Type:  '.$result1->complaint_name.'
                    </td>
                </tr>

                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                       Complaint Details:  '.$complaint_description.'
                    </td>
                </tr>
            
          
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Regards,<br>
                        <i style="font-weight: 300; color: #444;">Visvabharati</i>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 0px 25px 25px 25px; background: #1a1819; color: #fff; font-family: sans-serif; font-size: 20px;">
            <table cellspacing="0" cellpadding="0" style="width: 600px; margin: 0 auto; border: 0; background: #fff;">
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 5px;">&nbsp;
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table></body></html>';


            $data['body']=$message;
            $this->load->helper('email_helper');
            send_email('sketch.dev15@gmail.com',"A Complaint Has Been Lodged",$data);

            $data = array(
                'student_id'            => $id,
                'complaint_id'          => $complaint_type,
                'complaint_description' => $complaint_description,
                'complaint_date'        => date('Y-m-d H:i:s')
            );

            $this->db->insert(tablename('student_complaints'), $data);
            return $this->db->insert_id();
        }
    }


    public function addpayment($id = '',$ref_id) {

        $id                         = $this->input->post('student_id');
        $hostel_id                  = $this->input->post('student_hostel_name');
        $total_amount               = $this->input->post('total_amount');
        $total_paid                 = $this->input->post('total_paid');
        $total_overdue              = $this->input->post('total_overdue');
        $from_date              = date('Y-m-d', strtotime($this->input->post('new_from_date_hidden')));
        $to_date              = date('Y-m-d', strtotime($this->input->post('new_to_date_hidden')));

        $select_plan_month_checked  = $this->input->post('select_plan_month_checked');

        $select_plan_checked   = $this->input->post('select_plan_checked');
        $plan_type   = $this->input->post('plan_type');
        $plan_month_dates = explode('##', $select_plan_month_checked);
        $plan_month = explode('-', @$plan_month_dates[0]);
        $plan_month_no = explode('-', @$plan_month_dates[1]);

        $select_plan_month_checked_year  = $this->input->post('select_plan_month_checked_year');

        $select_plan_month_checked_year1  = $this->input->post('select_plan_month_checked_year1');


        $mess_value  = $this->input->post('mess_value');
        $room_value  = $this->input->post('room_value');
        $mess_value1 =  str_replace(",", "", $mess_value);
        $room_value1 =  str_replace(",", "", $room_value);
        $other_value = $total_amount - ($mess_value1 + $room_value1);


        $from_date_month = date('M', strtotime($this->input->post('new_from_date_hidden')));
        $to_date_month  = date('M', strtotime($this->input->post('new_to_date_hidden')));

        $room_value_json  = $this->input->post('room_value_json');
        $room_month_json  = $this->input->post('room_month_json');
        

        $month_names_breakup                 = $this->input->post('month_names_breakup');
        $month_fees_breakup              = $this->input->post('month_fees_breakup');

        if(!empty($id))
        {
             $data = array(
                'student_id'            => $id,
                'hostel_id'             => $hostel_id,
                'total_amount'          => $total_amount,
                'total_paid'            => $total_paid,
                'from_date'          => $from_date,
                'to_date'            => $to_date,
                'total_overdue'         => $total_overdue,
                'plan_month' => $from_date_month.'-'.$to_date_month,
                'plan_month_type' => $plan_type,
                'plan_month_amount' => $mess_value,
                'plan_month_start'=>$from_date,
                'plan_month_end' =>$to_date,
                'form_type'=>'hostel_fees',
                'room_value'=>$room_value,
                'other_value'=>$other_value,
                'room_value_json'=>@$room_value_json,
                'room_month_json'=>@$room_month_json,
                'month_names_breakup' => $month_names_breakup,
                'month_fees_breakup'  => $month_fees_breakup,
                'ref_id'  => $ref_id //sbi_payment
            );
            $this->db->insert(tablename('payment_details'), $data);
			$myquery=$this->db->last_query();
            $insert_id_last = $this->db->insert_id();
            return $insert_id_last;
            
        } 
    }

    public function load_all_hostel_data($hostel_type) {

        $this->db->select('hst.*,seats.total_seats');
        $this->db->from(tablename('hostel')." as hst");
        $this->db->join(tablename('seats_available')." as seats","seats.hostel_id = hst.id",'left');
        $this->db->where('hst.hostel_type', $hostel_type);
        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function load_room_rent($hostel_id,$stYr) {
        $this->db->select('t1.id as t1_id,t1.hostel_id,t1.start_year as t1_start_year,t1.end_year as t1_end_year,t2.*');
        $this->db->from(tablename('mess_charge_session')." as t1");
        $this->db->join(tablename('mess_charge_fee') . ' as t2', 't1.id = t2.mess_session_id', 'left'); 
        $this->db->where("t1.hostel_id", $hostel_id);  
        $this->db->where("t1.start_year", $stYr);
        $query = $this->db->get();
        $result = $query->row();

        //echo $this->db->last_query(); //die;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function get_payment_details($id) {
       $this->db->select('t1.*,t2.full_name as stName,t2.student_id as stId,t2.hostel_id,t2.gender,t2.hostel_name,t2.block_no,t2.floor_no,t2.room_no,t2.bed_no,t2.course_id,t2.institute_id,t2.department_id,t3.course_name,t4.hostel_name as HostelName,t2.date_of_allotment,t2.vacating_year');
        $this->db->from(tablename('payment_details')." as t1");
        $this->db->join(tablename('student')." as t2","t2.id = t1.student_id");
        $this->db->join(tablename('course')." as t3","t3.id = t2.course_id");
        $this->db->join(tablename('hostel')." as t4","t4.id = t2.hostel_name");

        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    // sbi_payment
    public function delete_temp_payment($student_id,$ref_id){
        $this->db->delete('payment_details', array('student_id' => $student_id, 'ref_id' => $ref_id, 'sbi_payment_status' => 2)); 
        return TRUE;
    }

    // sbi_payment
    public function update_payment_status($student_id,$ref_id,$transaction_id,$decrypt){

        $data = array(
            'transaction_id'=>$transaction_id,
            'sbi_payment_status' => 1,
            'payment_status' => 1,
            'payment_return_encode' => $decrypt
            );

        $this->db->trans_begin();
       
        $this->db->where('id', $student_id)->update(tablename('student'), array('payment_option_show'=> '2019-12-31 23:59:59'));

        $this->db->where(array('student_id' => $student_id, 'ref_id' => $ref_id, 'sbi_payment_status' => 2))->update(tablename('payment_details'), $data);

       if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE;
        }else{
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function hos_payment_invoice_details($paymentId){
        $this->db->select('t1.*,t2.full_name as stName,t2.student_id as stId,t2.hostel_id,t2.gender,t2.hostel_name,t2.block_no,t2.floor_no,t2.room_no,t2.bed_no,t2.course_id,t2.institute_id,t2.department_id,t3.course_name,t4.hostel_name as HostelName,t2.date_of_allotment,t2.vacating_year,t2.email_id,t2.contact_no,t2.caste_type,t2.nationality_type,t2.pwd_status');
        $this->db->from(tablename('payment_details')." as t1");
        $this->db->join(tablename('student')." as t2","t2.id = t1.student_id");
        $this->db->join(tablename('course')." as t3","t3.id = t2.course_id");
        $this->db->join(tablename('hostel')." as t4","t4.id = t2.hostel_name");

        $this->db->where('t1.id', $paymentId);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

}