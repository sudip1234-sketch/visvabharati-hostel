<?php

/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Allotmentmodel extends CI_Model {

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

    /**
     * Used for loading functionality of user for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the user that has been added by current admin [Table: dd_user]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {

      //echo "<pre>";print_r($_GET);//exit;

        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');
        $search_by_hostel       = $this->input->get('search_by_hostel');
        $search_by_category     = $this->input->get('search_by_category');

        $search_by_allotment  = $this->input->get('search_by_allotment');
        

        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");

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

         if(isset($search_by_pwd) && $search_by_pwd!='')
        {
            $this->db->where('st.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('st.nationality_type',$search_nationality_type);
        }

        if(!empty($search_by_hostel))
        {
            $this->db->where('st.hostel_name',$search_by_hostel);
        }

        if(!empty($search_by_category))
        {
            $this->db->where('st.caste_type',$search_by_category);
        }


        if($search_by_allotment!='')
        {           
          $this->db->where('st.is_approved',$search_by_allotment);  
        }


        //$this->db->where('is_approved',1);
        $this->db->order_by("final_score", "desc");

        $query = $this->db->get();
        $result = $query->result();

        //echo $this->db->last_query(); //exit;

      

        //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    /**
     * Used for fetching rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches rows from any table depending upon condition</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return array
     */
    public function get_result_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    /**
     * Used for fetching rows from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches rows from any table depending upon condition</p>
     *
     * @access  public
     * @param   {string} table - the table name whose data will be fetched
     * @param   {array[]} where - the where clause parameter for the sql
     * @return array
     */
    public function get_row_result($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

    public function get_row_data($id) {
       
        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,st.hostel_name,bg.name as bloodgroupname');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('hostel')." as hostel","hostel.id = st.hostel_id",'left');
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");
        $this->db->where('st.id',$id);

        $query = $this->db->get();
        $result = $query->row();
        if(!empty($result)){
          $result->date_of_birth = date('d-m-Y',strtotime(@$result->date_of_birth)); 
        }
        
        return $result;
    }


    /**
     * Used for change status functionality of user for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, check the current user status
     * and change it the the opposite [Table: dd_user]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function status($id) {
      $this->db->select('*');
      $this->db->from(tablename('student'));
      $this->db->where('id', $id);
      $this->db->where('delete_flag', 'N');

      $query = $this->db->get();
      $result = $query->row();

      if (!empty($result)) {
          $is_active = $result->is_active;

          if ($is_active == "N") {
              $new_is_active = "Y";
          } else {
              $new_is_active = "N";
          }

          $update = array('is_active' => $new_is_active);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('student'), $update)) {
              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
    }


    public function allotment_cancel($id) {

      $delete_faq = array(
        'hostel_id' => '',
        'hostel_name' => '',
        'hostel_code' => '',
        'password' => '',
        'allotment_assigned' => 0,
        'password' => '',
        'is_approved' => 0,
        'is_cancelled' => 1

    );

      $this->db->where('id', $id);

      if ($this->db->update(tablename('student'), $delete_faq, ['id' => $id])) {
          return 1;
      } else {
          return "";
      }
    }



    public function release_seat($id) {


    $this->db->select('*');
    $this->db->from(tablename('student'));
    $this->db->where('id', $id);

    $query = $this->db->get();
    $result = $query->row();

    if(!empty($result) && !empty($result->hostel_name))


        $this->db->select('*');
        $this->db->from(tablename('seats_available'));
        $this->db->where('hostel_id', $result->hostel_name);

        $query1     = $this->db->get();
        $seat_res   = $query1->row();

        if(!empty($seat_res))
        {
            $total_no_of_seats                   = $seat_res->total_seats;
            $total_seats_remaining               = $seat_res->total_seats_remaining;
            $seats_available_after_release       = $seat_res->seats_available_after_release;


            if($seat_res->total_seats_booked > 0)
            {
                $total_seats_booked = $seat_res->total_seats_booked - 1;
            }
            else
            {
                $total_seats_booked = 0;
            }


            //if($total_seats_booked <= $seats_available_after_release)
            //{
                 $data = array(
               
                'total_seats_booked'       => $total_seats_booked
               
                );

                $this->db->where('hostel_id', $result->hostel_name)->update(tablename('seats_available'), $data);
               
               
            //}

        }



      $delete_faq = array(
        'hostel_id' => '',
        'hostel_name' => '',
        'hostel_code' => '',
        'password' => '',
        'allotment_assigned' => 0,
        'password' => '',
        'is_approved' => 0,
        'is_released' => 1

    );
      $this->db->where('id', $id);

      if ($this->db->update(tablename('student'), $delete_faq, ['id' => $id])) {
          return 1;
      } else {
          return "";
      }

    }


    /**
     * Used for delete functionality of student for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: vb_student]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

    public function delete($id) {
      $delete_faq = array('delete_flag' => 'Y');
      $this->db->where('id', $id);

      if ($this->db->update(tablename('student'), $delete_faq, ['id' => $id])) {
          return 1;
      } else {
          return "";
      }
    }

      /**
     * Used for modify of allotment seats 
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: vb_student]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

    public function modify($id = '') {

    //  echo "<pre>"; print_r($_POST); //die;

        $id                         = $this->input->post('student_id');
        $hostel_id                  = $this->input->post('hostel_id');
        $hostel_name                = $this->input->post('hostel_name');
        $hostel_code                = $this->input->post('hostel_code');
        $block_no                   = $this->input->post('block_no');
        $floor_no                   = $this->input->post('floor_no');
        $room_no                    = $this->input->post('room_no');
        $bed_no                     = $this->input->post('bed_no');
        $hostel_wing                = $this->input->post('hostel_wing');
       
        if (!empty($id)) {

            $this->db->select('*');
            $this->db->from(tablename('student'));
            $this->db->where('id', $id);

            $query12     = $this->db->get();
            $result   = $query12->row();
 //echo "<pre>"; print_r($result); die; 

            $previous_bed = $result->bed_no;

            if($result->allotment_assigned != 1)
            {

              $this->load->helper('email_helper');


              ///////////////////// GENERATE PASSWORD AND SEND MAIL ///////////////////

              $is_approved = $result->is_approved;

          if ($is_approved == 0) {
              $new_is_approved = 1;


          $update = array('is_approved' => $new_is_approved);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('student'), $update)) {

            //echo "<pre>"; print_r($result); //die;

                //////////////////////// SEND MAIL //////////////////////////

            if($result->hostel_name==1){$hostel_name_text="Bhashabhavan";}elseif($result->hostel_name==2){$hostel_name_text="Vidya bhawan";}elseif($result->hostel_name==3){$hostel_name_text="Sikha bhawan";}elseif($result->hostel_name==4){$$hostel_name_text= "Sangit Bhavana";}elseif($result->hostel_name==5){$hostel_name_text= "kala Bhavana";}elseif($result->hostel_name==6){$hostel_name_text= "Palli samgathana";}elseif($result->hostel_name==7){$hostel_name_text= "Palli Siksha Bhavana";}elseif($result->hostel_name==8){$hostel_name_text= "Vinaya Bhavana";}elseif($result->hostel_name==9){$hostel_name_text= "Patha-Bhavana";}elseif($result->hostel_name==10){$hostel_name_text= "Sikha Satra";}
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $password = substr( str_shuffle( $chars ), 0, 8 );

          
         


           $message      = '<html><body>
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
           Dear '.$result->full_name.' <br><br>

You have been allotted in a Hostel.<br><br>

<b>Please visit the Visva-Bharati Hostel website</b> (WEB LINK) and <b>log-in</b> to your profile with the<br>
following credentials.<br><br>

An SMS alert has already been sent with similar information<br><br>

User Name:'.$result->student_id.'<br>
Password:'.$password.'<br><br>

Password can be changed after the initial entry into the website<br>
<br>

After log-in, please <u>complete the following formalities as instructed.</u><br><br>

Check the amount that has to be paid in your Hostel Boarders payment page.<br>
Pay the amount as applicable through SBI collect only.<br>
(www.onlinesbi.com/sbicollect/icollecthome.htm ).<br><br>

The above payment has to be completed within 2
 (two) days from the date of receipt of this
  email. Kindly note Failure to pay the requisite 
  fees within the stipulated time will result in the 
  cancellation of hostel allotment.<br><br>



Please <b>REPORT</b> to the <b><u>Allotment Cell, Proctors Office, Visva-Bharati</u></b>, between 10.30 am to
12.30 pm with the <b>following ORIGINAL documents within <u>2 (two) workings days</b> from the<br>
successful completion of the online payment(s)</u>.<br>
Documents to be furnished:<br><br>

For All <b><u>Indian Students</u></b><br><br>

1. Final Admission Slip, Visva-Bharati<br>
2. Visva-Bharati Hostel Application Slip<br>
3.  SBI-Collect (State Bank Collect) Payment Receipt (printout of Hostel Fees payment receipt)<br>
4. Last Final Examination Mark-sheet<br>
5. Address proof (Preferably Aadhaar Card)<br>
6. Caste Certificate (If Applicable)<br>
7. Certificate of Differently-Abled Persons (If Applicable)<br><br>

For All <b><u>Foreign/Overseas Students</u></b><br><br>

1. Final Admission Slip, Visva-Bharati<br>
2. Visva-Bharati Hostel Application Slip<br>
3  SBI-Collect (State Bank Collect) Payment Receipt (printout of Hostel Fees payment receipt)<br>

4. Last Final Examination Mark-sheet<br>
5. Passport and Visa<br><br>

<u>All documents</u> must be produced in the original and <u>one set of self-attested photocopy</u> of each<br>
document (to be <u>retained</u> by the office) are to be submitted at the time of reporting.<br><br>

<b><u>Please note that confirmation of hostel allotments is subject to verification of the above documents, any discrepancy(s) regarding uploading of data on the website by the student with original documents<br>
produced will also result in cancellation/withdrawal of hostel allotment</u></b>.<br> 

For any <b>queries and complaints regarding hostel automation ONLY</b>, please call or WhatsApp  7908160981 <b>between office hours ONLY </b>(10:30 am to 06:30 pm Friday through Tuesday, Wednesdays, Thursdays and other holidays excepting), or, kindly email us at <b>vbhostel@visva-bharati.ac.in</b>
Please <u>refer to the Hostel Manual</u> on the website for all rules and regulations pertaining to the hostel.


Welcome to the Visva-Bharati Hostel sorority/fraternity.<br><br>
Regards,<br><br>
The Proctor<br>
Visva-Bharati<br>
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

              //return 1;
          } 



            $this->db->select('*');
            $this->db->from(tablename('seats_available'));
            $this->db->where('hostel_id', $hostel_name);

            $query1     = $this->db->get();
            $seat_res   = $query1->row();

            if(!empty($seat_res))
            {
                $total_no_of_seats                   = $seat_res->total_seats;
                $total_seats_remaining               = $seat_res->total_seats_remaining;
                $seats_available_after_release       = $seat_res->seats_available_after_release;


                if($seat_res->total_seats_booked)
                {
                    $total_seats_booked = $seat_res->total_seats_booked + 1;
                }
                else
                {
                    $total_seats_booked = 1;
                }


                if($total_seats_booked <= $seats_available_after_release)
                {
                     $data = array(
                   
                    'total_seats_booked'       => $total_seats_booked
                   
                    );

                    $this->db->where('hostel_id', $hostel_name)->update(tablename('seats_available'), $data);
                   
                   
                }

            }


            // save booked bed nos. 25.10.18

          $this->db->select('*');
          $this->db->from(tablename('hostel_rooms_seats'));
          $this->db->where('hostel_id', $hostel_name);
          $this->db->where('block_id', $block_no);
          $this->db->where('floor_id', $floor_no);
          $this->db->where('room_no', $room_no);
          $query_bed = $this->db->get();
          $bed_res   = $query_bed->row();
          //echo "<pre>"; print_r($bed_res); die;

          if($bed_res->booked_bed_nos==''){
            $booked_bed = $bed_no;
          }else{
            $booked_bed = $bed_res->booked_bed_nos.','.$bed_no;
          }

          $update_bed = array('booked_bed_nos' => $booked_bed);
          $this->db->where('id', $bed_res->id);
          $this->db->update(tablename('hostel_rooms_seats'), $update_bed);

             // end save booked bed nos. 25.10.18

            
            ///////////////////////////// SEND SMS AFTER HOSTEL ASSIGNMENT ///////////////////////////

            $this->db->select('hostel_name');
            $this->db->from(tablename('hostel'));
            $this->db->where('id', $hostel_name);

            $hostel_query       = $this->db->get();
            $hostel_res         = $hostel_query->row();

            $contact_no = $result->contact_no;
            //$sms_content = 'Dear '.$result->full_name.', You have been assigned hostel '.$hostel_res->hostel_name;
           // $sms_content = 'Dear '.$result->full_name.', Please complete your registration process within 24 hours else your allotment will cancel';
                       // $sms_content = $result->full_name.'('.$result->student_id.'),  Room no '.$result->room_no.' Alloted in '.$hostel_name_text.' Hostel. Visit www.visvabharati-hostel.com and log-in with  USERNAME :'.$result->email_id.' Password: '.$password;
            $sms_content=$result->full_name.',   Hostel has been alloted . Visit www.visvabharati-hostel.com and log-in with  USERNAME :'.$result->student_id.' Password: '.$password;
            $timeout = 0;

            $ch = curl_init();
            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, "http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=91".$contact_no."&source=SKETCH&message=".urlencode($sms_content));

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

            ////////////////////////////// END ///////////////////////////////////

            // }
           

            // if($result->allotment_assigned != 1)
            // {
                $data = array(
                'hostel_id'             => $hostel_id,
                'hostel_name'           => $hostel_name,
                'hostel_code'           => $hostel_code,
                'block_no'              => $block_no,
                'floor_no'              => $floor_no,
                'room_no'               => $room_no,
                'bed_no'                => $bed_no,
                'hostel_wing'           => $hostel_wing,
                'allotment_assigned'    => 1,
                'hostel_assign_date'    => date('Y-m-d H:i:s')
                );
            }
            else
            {


              // edit booked bed nos. 25.10.18

          $this->db->select('*');
          $this->db->from(tablename('hostel_rooms_seats'));
          $this->db->where('hostel_id', $hostel_name);
          $this->db->where('block_id', $block_no);
          $this->db->where('floor_id', $floor_no);
          $this->db->where('room_no', $room_no);
          $query_bed = $this->db->get();
          $bed_res   = $query_bed->row();
          //echo "<pre>"; print_r($bed_res); die;

          if($bed_res->booked_bed_nos==''){
            $booked_bed = $bed_no;
          }else{

            $bed_released = explode(',', $bed_res->booked_bed_nos);

            if (($key = array_search($previous_bed, $bed_released)) !== false) {
                unset($bed_released[$key]);
            }
            $bed_released_save = implode(',', $bed_released);
            if($bed_released_save==''){
            $booked_bed = $bed_no;
          }else{
            $booked_bed = $bed_released_save.','.$bed_no;
          }
          }

          $update_bed = array('booked_bed_nos' => $booked_bed);
          $this->db->where('id', $bed_res->id);
          $this->db->update(tablename('hostel_rooms_seats'), $update_bed);

             // end edit booked bed nos. 25.10.18


                $data = array(                
                'hostel_id'             => $hostel_id,
                'hostel_name'           => $hostel_name,
                'hostel_code'           => $hostel_code,
                'block_no'              => $block_no,
                'floor_no'              => $floor_no,
                'room_no'               => $room_no,
                'bed_no'                => $bed_no,
                'hostel_wing'           => $hostel_wing   
                );
            }          
            $this->db->where('id', $id)->update(tablename('student'), $data);
            return $id;          
        } 
        
    }
/******************** 28.09.18 **********************/

  public function load_all_data_host_alloted() {

        

        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");     
        $this->db->where('hostel_id<>','');
        $this->db->where('is_approved',1);
        $this->db->order_by("final_score", "desc");
        $query = $this->db->get();
        $result = $query->result();

        //echo $this->db->last_query(); exit;

      

        //echo "<pre>";print_r($result);exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
}
/* End of file Allotmentmodel.php */
/* Location: ./application/modules/user/models/admin/Allotmentmodel.php */