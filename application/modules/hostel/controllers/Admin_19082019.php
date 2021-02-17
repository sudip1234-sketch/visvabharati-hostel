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
        $this->load->model('admin/Hostelmodel');
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
        $all_data = $this->Hostelmodel->load_all_data();
      
        $this->data             = array();
        $this->data['uri']      = $uri;
        $this->data['all_data'] = $all_data;
        $this->data['warden'] = $this->Hostelmodel->get_result_data('administration', ['administration_type' => 'warden','is_active'=>1]);

        $this->middle = 'hostel/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Hostel Added Successfully";
        $id = $this->input->post('ad_id');
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Hostel Updated Successfully";
        }


        if($this->input->post())
        {

           /* $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {*/
            $flg = $this->Hostelmodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-hostel-list');
            redirect($redirect);
           /* }*/

        }
        else
        {   
            $data=array();
            if(!empty($id))
            {  
              $where['id']=$id;
              $data['result']=$this->Hostelmodel->user_admin_get($where);
            }

        $getsitename = getsitename();
        $this->layouts->set_title($getsitename . ' | Hostel Management');
        $this->layouts->render('hostel/admin/form',$data , 'admin');
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
        $data = $this->Hostelmodel->get_row_data('hostel', ['id' => $id]);
       /* echo "<pre>";
        print_r($data);*/

        if(!empty($data))
        {
            echo json_encode($data);
        }
        else
        {
            echo false;
        }
    }


    public function check_hostelcode()
    {
        //echo 'test'; exit;
        $field = $this->input->post('field');
        $value = $this->input->post('value');

        $where[$field] = $value;

        echo $this->Hostelmodel->isunique($where) ? "true" : "false";
    }

     

     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status() {

        $flg = $this->Hostelmodel->status();

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
        $flg = $this->Hostelmodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-hostel-list'));
    }


     public function delete_hostel_image() {
        //echo "<pre>"; print_r($_POST); die;
        $data = $this->Hostelmodel->get_row_data('hostel', ['id' => $_POST['id']]);
        //echo "<pre>"; print_r($data); die;
        $hostel_pics = explode(',', $data->hostel_pics);
        if(in_array($_POST['imgName'], $hostel_pics)){
           $hostel_pics_diff = array_diff($hostel_pics, array($_POST['imgName']));
           $hostel_pics_diff = implode(',', $hostel_pics_diff);
           // save
           $dataSave = array('hostel_pics'=>$hostel_pics_diff);
           $this->db->update(tablename('hostel'), $dataSave);
        }

        $data_updated = $this->Hostelmodel->get_row_data('hostel', ['id' => $_POST['id']]);
        //echo "<pre>"; print_r($data_updated); die;
        echo json_encode($data_updated); die;

    }

    public function download_hostel_report($hostel_id){
        $this->data['all_data'] = $this->Hostelmodel->getHostelDetails($hostel_id);
        $html =$this->load->view('hostel/admin/download_hostel_report',$this->data,true); 
        file_put_contents("Visva bharati hostel report.xls",$html);
        header('Content-Description: File Transfer');
        header("Content-type: application/msword; charset=utf-8");
        header("Content-Disposition: attachment;Filename=Visva bharati hostel report.xls");
        readfile("Visva bharati hostel report.xls");
        unlink("Visva bharati hostel report.xls");
        die;
    }

}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
