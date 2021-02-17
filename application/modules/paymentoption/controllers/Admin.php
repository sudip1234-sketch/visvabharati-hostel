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

        $uri = $this->uri->segment(1);
        $all_data = $this->Paymentmodel->load_all_data();
      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;

        $this->middle = 'paymentoption/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Payment Option Added Successfully";
        $id = $this->input->post('ad_id');
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Payment Option Updated Successfully";
        }


        if($this->input->post())
        {

           /* $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {*/
            $flg = $this->Paymentmodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-paymentoption-list');
            redirect($redirect);
           /* }*/

        }
        else
        {   
            $data=array();
            if(!empty($id))
            {  
              $where['id']=$id;
              $data['result']=$this->Paymentmodel->user_admin_get($where);
            }

        $getsitename = getsitename();
        $this->layouts->set_title($getsitename . ' | Payment Management');
        $this->layouts->render('paymentoption/admin/form',$data , 'admin');
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


        $id = $this->input->post('id');
        $data = $this->Paymentmodel->get_row_data('payment_options', ['id' => $id]);
       // echo "<pre>";
      //  print_r($data);exit;

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
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status() {

        $flg = $this->Paymentmodel->status();

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
        $flg = $this->Paymentmodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-paymentoption-list'));
    }

}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
