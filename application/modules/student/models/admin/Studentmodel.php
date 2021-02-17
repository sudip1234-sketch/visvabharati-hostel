<?php

/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Studentmodel extends CI_Model {

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

   
    public function load_all_data() {

        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');

        $this->db->select('st.*,dept.department_name,course.course_name');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");

         if(!empty($allotment_type_search) && $allotment_type_search=='new_applied')
        {
            $this->db->where('is_approved',0);
        }

        if(!empty($allotment_type_search) && $allotment_type_search=='already_alloted')
        {
            $this->db->where('is_approved',1);
        }

        if(!empty($search_by_bhavan))
        {
            $this->db->where('st.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('st.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('st.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('st.gender',$gender);
        }

        if(isset($search_by_pwd))
        {
            $this->db->where('st.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('st.nationality_type',$search_nationality_type);
        }

        $this->db->order_by("final_score", "desc");
        $this->db->order_by("is_approved", "asc");
        $this->db->order_by("created_date", "desc");

        $query = $this->db->get();

        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function get_student_sl_no() {

        $query = $this->db->query("SELECT * FROM `vb_student` ORDER BY id DESC LIMIT 1");
        $result = $query->result();
        //return $result;
        return $result[0]->sl_no;
    }


     public function get_student_last_sl_no($institute_id,$course_id,$department_id) {

        $query = $this->db->query("SELECT * FROM `vb_student` WHERE institute_id =".$institute_id." 
        AND course_id =".$course_id." 
        AND department_id =".$department_id." 
        ORDER BY student_id DESC LIMIT 1");
        $result = $query->result();
        //return $result;
        if($result)
        {
            return $result[0]->student_id;
        }
        else
        {
            return 0;
        }
        
    }



    function isunique($where) 
    {
      
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

   
    public function get_row_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }


   
    public function status() {

     $id  = $this->input->post('id'); 


      $this->db->select('*');
      $this->db->from(tablename('student'));
      $this->db->where('id', $id);

      $query = $this->db->get();
      $result = $query->row();

      //echo "<pre>"; print_r($result); die;

      if (!empty($result)) {
          $is_approved = $result->is_approved;

          if ($is_approved == 0) {
              $new_is_approved = 1;


          $update = array('is_approved' => $new_is_approved);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('student'), $update)) {

            //echo "<pre>"; print_r($result); //die;

                //////////////////////// SEND MAIL //////////////////////////


            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $password = substr( str_shuffle( $chars ), 0, 8 );
   
         


            $message = '<html><body>
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
						Hello <i style="font-weight: 300; color: #444;">'.@$result->fullname.'</i>,
					</td>
				</tr>

				<tr>
					<td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
						Email : '.$result->email_id.'
					</td>
				</tr>
				<tr>
					<td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
						Student Id : '.$result->student_id.'
					</td>
				</tr>
				<tr>
					<td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
						Password : '.$password.'
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
					<td style="text-align: left; vertical-align: middle; padding: 5px;">
						&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table></body></html>
';


            $updateArr = array();
            $data = array(
                'password'             => md5($password)
            );

            $this->db->where('id', $id)->update(tablename('student'), $data);

            $data['body']=$message;
            send_email($result->email_id,"Your Login Credentials to login to Visvabharati",$data);


          } else {
              $new_is_approved = 0;
          }

              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
    }

    public function delete() {

      $id  = $this->input->post('del_ad_id');

      $this->db->where('id', $id);
      $this->db->delete(tablename('student')); 

      return true;
    }

    
    public function updateData($data, $uid){

        $this->db->where('id', $uid);
        $query = $this->db->update(tablename('student'), $data);  
        return $query;

    }

     public function modify($id = '') {        
        //echo "<pre>"; print_r($_POST);

        //echo "<pre>"; print_r($_FILES);

        $stu_id = $this->input->post('stu_id');
        $id                         = $this->input->post('id');
        $stu_first_no                 = $this->input->post('student_id');

        $student_id_unique          = $this->input->post('student_id_unique');
        $student_id                 = $stu_first_no.''.$student_id_unique;

        $student_profile_image      = $this->input->post('student_profile_image');
        $sl_no                      = $this->input->post('sl_no');
        $full_name                  = $this->input->post('full_name');
        $contact_no                 = $this->input->post('contact_no');
        $email_id                   = $this->input->post('email_id');
        $university_id              = $this->input->post('university_id');
        $hostel_id                  = $this->input->post('hostel_id');
        $gender                     = $this->input->post('gender');
        $hostel_name                = $this->input->post('hostel_name');
        $hostel_code                = $this->input->post('hostel_code');
        $room_no                    = $this->input->post('room_no');
        $hostel_wing                = $this->input->post('hostel_wing');
        $course_id                  = $this->input->post('course_id');
        $department_id              = $this->input->post('department_id');
        $institute_id               = $this->input->post('institute_id');
        $date_of_allotment          = $this->input->post('date_of_allotment');
        $academic_year              = $this->input->post('academic_year');
        $vacating_year              = $this->input->post('vacating_year');
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
        $nationality_type           = $this->input->post('nationality_type');
        $pwd_status                 = 1;
        $physically_challenged      = $this->input->post('physically_challenged');
        $caste_type                 = $this->input->post('caste_type');
        $last_final_exam_score      = $this->input->post('last_final_exam_score');
        
        $distance_score             = $this->input->post('distance_score');
        $distance_frm               = $this->input->post('distance_frm');
        $final_score                = $this->input->post('final_score');
        $blood_group                = $this->input->post('blood_group');

        $cgpa_score_card            = $this->input->post('cgpa_score_card');
        $identification_card        = $this->input->post('identification_card');
        $other_caste_card           = $this->input->post('other_caste_card');
        $student_signature          = $this->input->post('student_signature_image');
        $renewal_option             = $this->input->post('renewal_option');
        $obtain_marks_type          = $this->input->post('obtain_marks_type');

        $institute_idd           = $this->input->post('institute_idd');
        $course_idd          = $this->input->post('course_idd');
        $department_idd             = $this->input->post('department_idd');
        $datepicker11          = $this->input->post('datepicker11');

       $academic_month = $this->input->post('academic_month');
       $vacating_month = $this->input->post('vacating_month');

        $semester             = $this->input->post('semester');
        $district          = $this->input->post('district');

        if(!empty($_FILES['profile_image']['name']))
        {

            $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/student_pics/';
            $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 
            
            $this->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
            $this->upload->initialize($config);


            if($_FILES['profile_image']['error']==0)
            {
                $picName=$_FILES['profile_image']['name']; 
                $ext = end((explode(".", $_FILES['profile_image']['name']))); 
            
                 // generate a unique file name
                $rand = md5(uniqid($picName, true));
              
                $newPicName=$rand.'.'.$ext;
              
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'] ,$destination))
                {
                    
                    $image_name = $newPicName;
                }
            }

        }
        else
        {
            $image_name = $student_profile_image;
        }

      


        
            if(!empty($_FILES['student_signature']['name']))
            {

                $uploadPath4 =  $_SERVER['DOCUMENT_ROOT'].'/assets/student_signature/';
                $allowedTypes4 = 'gif|jpg|jpeg|png|bmp'; 
                
                $this->load->library('upload');
                $config['upload_path'] = $uploadPath4;
                $config['allowed_types'] = $allowedTypes4;
                $config['file_name'] = time();
                $this->upload->initialize($config);


                if($_FILES['student_signature']['error']==0)
                {
                    $picName4=$_FILES['student_signature']['name']; 
                    $ext4 = end((explode(".", $_FILES['student_signature']['name']))); 
                
                     // generate a unique file name
                    $rand4 = md5(uniqid($picName4, true));
                  
                    $newPicName4=$rand4.'.'.$ext4;
                  
                    $destination4=$uploadPath4.$newPicName4; 

                    if (move_uploaded_file($_FILES['student_signature']['tmp_name'] ,$destination4))
                    {
                        
                        $signature_image = $newPicName4;
                    }
                }

            }else{                
                $signature_image = $student_signature;        
            }


        if (!empty($stu_id)) {

            // $query_stu = $this->db->query("SELECT final_score,institute_id FROM `vb_student` WHERE `id`=".$stu_id."");
            // $stu = $query_stu->row();


            $data = array(                
                'full_name'             => $full_name,
                'contact_no'            => $contact_no,
                'email_id'              => $email_id,
                'profile_image'         => $image_name,
                'gender'                => $gender,
                'blood_group'           => $blood_group,
                //'university_id'         => $university_id,
                //'hostel_id'             => $hostel_id,
                //'hostel_name'           => $hostel_name,
                //'hostel_code'           => $hostel_code,
                //'room_no'               => $room_no,
                //'hostel_wing'           => $hostel_wing,
                //'course_id'             => $course_id,
                //'department_id'         => $department_id,
                //'institute_id'          => $institute_id,
                //'date_of_allotment'     => date("Y-m-d H:i:s",strtotime($date_of_allotment)),
                //'academic_year'         => $academic_year,
                //'vacating_year'         => $vacating_year,

                //'academic_month'         => $academic_month,
                //'vacating_month'         => $vacating_month,
                


                'vb_reg_id'             => $vb_reg_id,
                'date_of_birth'         => date("Y-m-d H:i:s",strtotime($date_of_birth)),
                'aadhar_card_no'        => $aadhar_card_no,
               // 'identity_document'     => $identity_document,
                'state_id'              => $state_id,
                'address'               => $address,
                'city'                  => $city,
                //'pincode'               => $pincode,
                'guardian_name'         => $guardian_name,
                'relation_with_guardian'=> $relation_with_guardian,
                'guardian_contact_no'   => $guardian_contact_no,
                'guardian_email_id'     => $guardian_email_id,
                'guardian_address'      => $guardian_address,
                'pwd_status'            => $pwd_status,
                'physically_challenged' => $physically_challenged,
                'caste_type'            => $caste_type,
                'nationality_type'      => $nationality_type,
                //'other_caste_document'  => $other_caste_document,
                //'distance_score'        => $distance_score,
                 //'last_final_exam_score' => $last_final_exam_score,
                 //'distance_frm'          => $distance_frm,
               // 'final_score'           => $final_score,
                //'cgpa_score_card'       => $cgpa_score_card,
                //'rank'                  => $latest_rank,
                'renewal_option'        => $renewal_option,
                //'obtain_marks_type'     => $obtain_marks_type,
                'updated_date'          => date('Y-m-d H:i:s'),
                'student_signature' => $signature_image

            );
            //echo $stu_id; 
            //echo "<pre>"; print_r($data); die;
            $this->db->where('id', $stu_id)->update(tablename('student'), $data);

            //echo $this->db->last_query(); die();
            
            // if($final_score != $stu->final_score){
            // $query_rank = $this->db->query("SELECT id,rank,final_score FROM `vb_student` WHERE `institute_id`=".$stu->institute_id." ORDER BY final_score DESC");
            //     $result_rank = $query_rank->result();
            //     //echo "<pre>"; print_r($result_rank); die;
            //     $latest_rank = 1;
            //     if(!empty($result_rank))
            //     {
            //         foreach ($result_rank as $value) {
            //             $data_rank = array(
            //                     'rank' => $latest_rank,
            //                 );
            //            $this->db->where('id', $value->id)->update(tablename('student'), $data_rank);
            //            $latest_rank++;
            //         }
            //     }
            // }


           // if($obtain_marks_type == 0)
           // {
                   /* $subject              = $this->input->post('subject');
                    $score                = $this->input->post('score');

                    if(!empty($subject) && !empty($score))
                    {

                        $this->db->where('student_id', $stu_id);
                        $this->db->delete(tablename('student_subject')); 


                        for($i=0;$i<count($subject);$i++)
                        {
                            $data = array();
                            $data = array(

                                'student_id'    => $stu_id,
                                'subject'       => $subject[$i],
                                'score'         => $score[$i]
                            );

                            $this->db->insert(tablename('student_subject'), $data);

                        }

                    }*/

           // }

           
            return $stu_id;
        } else {
     
            $data = array(
                'sl_no'            => $student_id_unique,
                'stu_first_no'            => $stu_first_no,
                'student_id'            => $student_id,
                'full_name'             => $full_name,
                'contact_no'            => $contact_no,
                'email_id'              => $email_id,
                'profile_image'         => $image_name,
                'gender'                => $gender,
                'blood_group'           => $blood_group,
                'university_id'         => $university_id,
                //'hostel_id'             => $hostel_id,
                //'hostel_name'           => $hostel_name,
                //'hostel_code'           => $hostel_code,
                //'room_no'               => $room_no,
                //'hostel_wing'           => $hostel_wing,
                'course_id'             => $course_idd,
                'department_id'         => $department_idd,
                'institute_id'          => $institute_idd,
                'date_of_allotment'     => date("Y-m-d H:i:s",strtotime($date_of_allotment)),
                //'academic_year'         => $academic_year,
                'vacating_year'         => $vacating_year,
                //'academic_month'         => $academic_month,
                'vacating_month'         => $vacating_month,
                
                'vb_reg_id'             => $vb_reg_id,
                'date_of_birth'         => date("Y-m-d H:i:s",strtotime($date_of_birth)),
                'aadhar_card_no'        => $aadhar_card_no,
                //'identity_document'     => $identity_document,
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
                'nationality_type'      => $nationality_type,
                //'other_caste_document'  => $other_caste_document,
                'last_final_exam_score' => $last_final_exam_score,
                'distance_score'        => $distance_score,
                'distance_frm'          => $distance_frm,
                'final_score'           => $final_score,
                //'cgpa_score_card'       => $cgpa_score_card,
                //'rank'                  => $latest_rank,
                'renewal_option'        => $renewal_option,
                'obtain_marks_type'     => $obtain_marks_type,
                'is_approved'           => '0',
                'created_date'          => date('Y-m-d H:i:s'),
                'student_signature'     => $signature_image,
                'otp_confirm'           => '1',
                'created_by'            => 'admin',
                'semester'              => $semester,
                'district'              => $district
            );

          
            $this->db->insert(tablename('student'), $data);
            $new_id = $this->db->insert_id();

            if(!empty($new_id))
            {
                 /**** set rank ***/

                $query_rank = $this->db->query("SELECT id,rank,final_score FROM `vb_student` WHERE `institute_id`=".$institute_idd." ORDER BY final_score DESC");
                $result_rank = $query_rank->result();
                //echo "<pre>"; print_r($result_rank); die;
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

                /**** end set rank ***/

                if($obtain_marks_type == 0)
                {
                    $subject                = $this->input->post('subject');
                    $score                = $this->input->post('score');

                    for($i=0;$i<count($subject);$i++)
                    {
                            $data = array();
                            $data = array(
                                'student_id' => $new_id,
                                'subject' => $subject[$i],
                                'score' => $score[$i]
                            );
                            $this->db->insert(tablename('student_subject'), $data);

                    }

                }

            $id = $new_id;

            }


            return $id;
        }
    }



}
/* End of file Studentmodel.php */
/* Location: ./application/modules/students/models/admin/Studentmodel.php */