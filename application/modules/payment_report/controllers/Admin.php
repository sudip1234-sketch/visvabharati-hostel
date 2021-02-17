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
        $this->load->model('admin/Paymentmodel');
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
        $all_data = $this->Paymentmodel->load_all_data();

        $uri                            = $this->uri->segment(1);
        $this->data                     = array();
        $this->data['uri']              = $uri;
        $this->data['all_data']         = $all_data;

        $this->data['all_bloodgroups']  = $this->Paymentmodel->get_result_data('bloodgroup', ['is_active' => 'Y']);
       // $this->data['all_courses']      = $this->Paymentmodel->get_result_data('course', ['is_active' => 'Y']);
        //$this->data['all_departments']  = $this->Paymentmodel->get_result_data('department', ['is_active' => 'Y']);

         if(isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!=''){
            $this->data['all_courses']       = $this->Paymentmodel->get_result_data('course', ['is_active' => 'Y','institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_courses']       = array();
        }

        if((isset($_GET['search_by_course']) && $_GET['search_by_course']!='') && (isset($_GET['search_by_bhavan']) && $_GET['search_by_bhavan']!='')){
            $this->data['all_departments']       = $this->Paymentmodel->get_result_data('department', ['is_active' => 'Y','course_id'=>$_GET['search_by_course'],'institute_id'=>$_GET['search_by_bhavan']]);
        }else{
            $this->data['all_departments']       = array();
        }

        
        $this->data['all_institutes']   = $this->Paymentmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states']       = $this->Paymentmodel->get_result_data('state', ['is_active' => 'Y']);
       
        $this->middle = 'payment_report/admin/list';
        $this->admin_layout();
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
            $flg = $this->Paymentmodel->modify($id);

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
        $data = $this->Paymentmodel->get_row_data('student', ['id' => $id]);

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

    public function total_payment_details() {

        $id   = $this->input->post('id');
        $data = $this->Paymentmodel->get_row_data('payment_details', ['id' => $id]);

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
    public function status($id) {
        $flg = $this->Paymentmodel->status($id);

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

    public function download_paymentreport() {
        $this->data['all_data'] = $this->Paymentmodel->load_all_data_excel();
     
        $html =$this->load->view('payment_report/admin/download_paymentreport',$this->data,true); 

       // echo "<pre>"; print_r($html); die;
        //echo getcwd(); die;
        file_put_contents("Visva bharati hostel fees payment report.xls",$html);
        header('Content-Description: File Transfer');
        header("Content-type: application/msword; charset=utf-8");
        header("Content-Disposition: attachment;Filename=Visva bharati hostel fees payment report.xls");
        readfile("Visva bharati hostel fees payment report.xls");
        unlink("Visva bharati hostel fees payment report.xls");
        die;
        
    }

     public function printSlip($id='')
    {
        
        $data  = array();
        $data['payment_details'] = $this->Paymentmodel->get_payment_details(base64_decode($id));

        $data['price_word'] =  $this->priceinwords(@$data['payment_details']->total_amount);
        //echo "<pre>"; print_r($data['payment_details']); 

        $this->load->view('admin/receiptPrint',$data);
        
        
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

}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
