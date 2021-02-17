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
        $this->load->model('admin/Noticemodel');
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
        $all_data = $this->db->select('*')->order_by('id','desc')->get('notice')->result();
        $uri = $this->uri->segment(1);
        $this->data = array();
        $this->data['uri'] = $uri;
        $this->data['all_data'] = $all_data;
       // echo "<pre>"; print_r($all_data); //die;

      /*  $this->data['all_courses']      = $this->Studentmodel->get_result_data('course', ['is_active' => 'Y']);
        $this->data['all_departments']  = $this->Studentmodel->get_result_data('department', ['is_active' => 'Y']);
        $this->data['all_institutes']   = $this->Studentmodel->get_result_data('institute', ['is_active' => 'Y']);
        $this->data['all_states']       = $this->Studentmodel->get_result_data('state', ['is_active' => 'Y']);*/

       /* echo "<pre>";
        print_r($this->data['all_courses']);
        exit;*/

        $this->middle = 'notice/admin/list';
        $this->admin_layout();
    }

    public function form($id=NULL)
    {
        //admin_authenticate();
        $admin_uid=$this->session->userdata('admin_uid');
        $msg="Notice Added Successfully";
        if(!empty($id))
        {
          $id=base64_decode(urldecode($id));
          $msg="Notice Updated Successfully";
        }

      /*  echo "<pre>";
        print_r($this->input->post());
        exit;*/

        if($this->input->post())
        {

           /* $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            if ($this->form_validation->run() == TRUE) {*/
            $flg = $this->Noticemodel->modify($id);
            if (!empty($flg)) 
            {
                $this->session->set_flashdata('successmessage', $msg);
            }
            else 
            {
                $this->session->set_flashdata('errormessage', "Oops! Something went wrong.Please try again later.");
            }
            $redirect = base_url('admin-notice-list');
            redirect($redirect);
           /* }*/

        }
        else
        {   
            $data=array();
            if(!empty($id))
            {  
              $where['id']=$id;
              $data['result']=$this->Studentmodel->user_admin_get($where);
            }

        $getsitename = getsitename();
        $this->layouts->set_title($getsitename . ' | User Management');
        $this->layouts->render('user/admin/userform',$data , 'admin');
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
        $data = $this->Noticemodel->get_row_data('notice', ['id' => $id]);
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


     /**
     * Status Change function of User module
     *
     * @access  public
     * @param   id
     * @return  success of failure of status change
     */
    public function status() {

        $flg = $this->Noticemodel->status();

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

        $flg = $this->Noticemodel->delete();

        if (!empty($flg)) {
            $this->session->set_flashdata('successmessage', 'Data deleted successfully');
        } else {
            $this->session->set_flashdata('errormessage', 'Oops! Something went wrong');
        }

        redirect(base_url('admin-notice-list'));
    }


     public function delete_notice_attachment() {
        //echo "<pre>"; print_r($_POST); die;
        $data = $this->Noticemodel->get_row_data('notice', ['id' => $_POST['id']]);
        //echo "<pre>"; print_r($data); die;
        $notice_attachments = explode(',', $data->notice_attachment);

        if(in_array($_POST['imgName'], $notice_attachments)){
           $notice_attachments_diff = array_diff($notice_attachments, array($_POST['imgName']));
           $notice_attachments_diff = implode(',', $notice_attachments_diff);
           // save
           $dataSave = array('notice_attachment'=>$notice_attachments_diff);
           $this->db->where('id', $_POST['id']);
           $this->db->update(tablename('notice'), $dataSave);
        }

        $data_updated = $this->Noticemodel->get_row_data('notice', ['id' => $_POST['id']]);
        //echo "<pre>"; print_r($data_updated); die;
        echo json_encode($data_updated); die;

    }


}
/* End of file admin.php */
/* Location: ./application/modules/user/controllers/admin.php */
