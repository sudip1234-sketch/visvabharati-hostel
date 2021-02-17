<?php
/**
 * No direct access
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Admin Class for student [HMVC]. Handles all the datatypes and methods required
 * for student section of Visvabharati
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
        $this->load->model('admin/Studentmodel');
        $this->load->helper('email_helper');
        
    }

    /**
     * Index Page for this student controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {
     
        $all_data                       = $this->Studentmodel->load_all_data();
        $uri                            = $this->uri->segment(1);
  
        $this->data                     = array();
        $this->data['uri']              = $uri;
        $this->data['all_data']         = $all_data;
        
        $this->data['all_tot_students'] = $this->Studentmodel->get_result_data('student');

        $this->data['all_new_stutents'] = $this->Studentmodel->get_result_data('student', ['is_approved' => '0']);
        $this->data['all_bloodgroups']  = $this->Studentmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
        $this->data['all_courses']      = $this->Studentmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Studentmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Studentmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states']       = $this->Studentmodel->get_result_state('state', ['is_active' => 'Y']);

        $this->middle = 'student/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
       
        $uri = $this->uri->segment(1);
        $admin_uid                      = $this->session->userdata('admin_uid');
        $msg                            = "Student Added Successfully";

        if(!empty($id))
        {
          $id   = base64_decode(urldecode($id));
          $msg  = "Student Updated Successfully";
        }

        if($this->input->post())
        {
            //echo "<pre>"; print_r($_POST); die;
            $flg = $this->Studentmodel->modify($id);

            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            
           // $redirect = base_url('admin-student-list');
            $redirect = base_url('admin-allotment-list');
            redirect($redirect);
           

        }
        else
        {   
            $data = array();
            if(!empty($id))
            {  
              $where['id']      = $id;
              $this->data['result']      = $this->Studentmodel->user_admin_get($where);
            }

            $this->data['uri']      = $uri;
            $this->middle = 'student/admin/form';
            $this->admin_layout();
        }
    }


    public function check_email()
    {
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        $where[$field] = $value;

        echo $this->Studentmodel->isunique($where) ? "true" : "false";
    }


    public function get_sl_no()
    {
        $sl_no = $this->Studentmodel->get_student_sl_no();
        echo  $sl_no;
    }

    public function get_course_list()
    {
        $institute_id   = $this->input->post('institute_id'); 
        $data           = $this->Studentmodel->get_result_data('course', ['institute_id' => $institute_id]);
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
        $data           = $this->Studentmodel->get_result_data('department', ['institute_id' => $institute_id,
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



    public function generate_student_id()
    {
        //echo "<pre>"; print_r($_POST); die;       
        $student_id         = $this->input->post('student_id');
        // check student id exsist or not        
        $chk_student_id = $this->db->select('*')->where('stu_first_no',$student_id)->order_by('sl_no','desc')->limit('1')->get('student')->row();
        //echo "<pre>"; print_r($chk_student_id); die;
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
       


        $student_exist          = $this->Studentmodel->get_row_data('student', ['student_id' => $renewal_student_id]);
       
        if(!empty($student_exist))
        {
           // echo json_encode($generated_student_id);
            echo true;
        }
        else
        {
            echo false;
        }
    }


    public function get_student_subject_details()
    {
        $student_id      = $this->input->post('student_id'); 
       
        $student_subject          = $this->Studentmodel->get_result_data('student_subject', ['student_id' => $student_id]);
       
        if(!empty($student_subject))
        {
           echo json_encode($student_subject);
            
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
    public function details() {

        $id   = $this->input->post('id');
        $data = $this->Studentmodel->get_row_data('student', ['id' => $id]);
      
        $data->date_of_allotment    = date('d/m/Y',strtotime($data->date_of_allotment));
        $data->date_of_birth        = date('d/m/Y',strtotime($data->date_of_birth));

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
     * Status Change function of Student module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    

    public function status() {

        $flg = $this->Studentmodel->status();

        if(!empty($flg))
        {
            echo json_encode($flg);
        }
        else
        {
            echo false;
        }
    }

    /**
     * Delete function of user module
     *
     * @access  public
     * @param   id
     * @return  success of failure of delete
     */

    public function delete() {
        $flg = $this->Studentmodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

       // redirect(base_url('admin-student-list'));
        redirect(base_url('admin-allotment-list'));
        
    }

 public function admin_check_bhavanCode()
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


    public function admin_check_courseType()
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



    public function admin_check_Department()
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

    public function admin_approved_student()
    {
        //echo "<pre>"; print_r($_POST); die;


        $stId = $_POST['student_app'];
        if(!empty($stId)){
            foreach ($stId as $valstId) {
                $id  = $valstId;
                 $this->db->select('*');
                  $this->db->from(tablename('student'));
                  $this->db->where('id', $id);
                  $query = $this->db->get();
                  $result = $query->row();

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

            $message            = '<html><body>
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

          }
              
          }
      }// student data not empty



            }
        }



        echo "done"; exit();      
        

    }


}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
