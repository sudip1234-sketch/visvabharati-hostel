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
        $this->load->model('admin/Reissuecardmodel');
    }

    /**
     * Index Page for this user controller.
     *
     * @access  public
     * @param   none
     * @return  string
     */
    public function index() {
        //echo "hi"; die;
        $all_data = $this->Reissuecardmodel->load_all_data();

        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;

       
        $this->middle = 'student_card_reissue//admin/list';
        $this->admin_layout();
    }


    public function details() {


        $id = $this->input->post('id');
        $data = $this->Reissuecardmodel->get_row_data('reissue_student_card', ['id' => $id]);
    
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function form($id=NULL)
    {
       
        $uri = $this->uri->segment(1);
        $admin_uid                      = $this->session->userdata('admin_uid');
        $msg                            = "Payment Added Successfully";

        if(!empty($id))
        {
          $id   = base64_decode(urldecode($id));
          $msg  = "Payment Updated Successfully";
        }

        if($this->input->post())
        {
            $flg = $this->Reissuecardmodel->modify($id);

            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            
            $redirect = base_url('admin-payment-list');
            redirect($redirect);
           

        }
        else
        {   
            $data = array();
            if(!empty($id))
            {  
              $where['id']      = $id;
              $this->data['result']      = $this->Paymentmodel->user_admin_get($where);
            }

            $this->data['uri']      = $uri;
            $this->middle = 'payment/admin/form';
            $this->admin_layout();
        }
    }

    public function send_sms() {

        $id   = $this->input->post('id');
        $data = $this->Reissuecardmodel->get_row_data('student', ['id' => $id]);

        $this->reg_sms($data->contact_no,$data->full_name);
        
        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function allotment_cancel() {

        $id   = $this->input->post('id');

        $update = array(
          'allotment_assigned' => 0,
          'hostel_name' => '',
          'hostel_code' => '',
          'hostel_id' => '',
          'block_no' => 0,
          'floor_no' => 0,
          'room_no' => '',
          'bed_no' => 0
        );
        $this->db->where('student_id', $id);
        $flg = $this->db->update(tablename('student'), $update);
 
       if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Allotment Has Been Cancelled');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-payment-list'));
    }




    function reg_sms($contact,$full_name)
    {
        $sms_text='Your payment is due.';
        $message = urlencode($sms_text);
        $url='http://103.16.101.52:8080/sendsms/bulksms?';
        $data='username=swbs-viswa&password=viswa123&type=0&dlr=1&destination='.$contact.'&source=SKETCH&message='.$message;

        //echo $data; exit;
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
         }

        curl_close($ch);
 
    }


     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */

     public function reissue_card() {

        $flg = $this->Reissuecardmodel->reissue_card();

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
    public function delete($id) {
        $flg = $this->Paymentmodel->delete($id);

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'User deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-user-list'));
    }



    public function pay_status() {
      //echo "<pre>"; print_r($_POST); die;
        $this->db->where('id',$_POST['id'])->update(tablename('payment_details'), array('receivePayment'=>$_POST['pay_status']));
        echo "done"; exit();

    }
/***********************************/

public function payment_hostel() {
        $all_data = $this->Paymentmodel->load_all_payment_hostel();
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;

        $this->data['all_courses']      = $this->Paymentmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Paymentmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Paymentmodel->get_result_data('institute', ['is_active' => 'Y']);
        
        $this->middle = 'payment/admin/HostelAlert';
        $this->admin_layout();
    }
public function payment_mess() {
       $all_data = $this->Paymentmodel->load_all_payment_mess();
        
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;

        $this->data['all_courses']      = $this->Paymentmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Paymentmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Paymentmodel->get_result_data('institute', ['is_active' => 'Y']);
        
        $this->middle = 'payment/admin/MessAlert';
        $this->admin_layout();
    }
}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
