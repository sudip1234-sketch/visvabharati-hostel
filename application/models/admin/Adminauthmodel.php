<?php

/**
 * Auth Model Class. Handles all the datatypes and methodes required for Authentication Purpose
 *
 */
class Adminauthmodel extends CI_Model {

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
        $this->load->helper('string');
    }

    
    public function admin_login() {
       //echo "<pre>"; print_r($this->input->post()); 
        $email_id = $this->input->post('username');
        $password = md5($this->input->post('passwd'));

        $this->db->select('*');
        $this->db->from(tablename('admin'));
        $this->db->where('emailid', addslashes(trim($email_id)));
        $this->db->where('password', $password);
        //$this->db->where('id', 1);

        $auth_query = $this->db->get();
        $auth_result = $auth_query->row();

       // echo $this->db->last_query(); exit;

       //echo "<pre>"; print_r($auth_result); die;

        if (!empty($auth_result)) {

            $admin_id = $auth_result->id;
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $online = 1;
            $modified_date = date('Y-m-d H:i:s');

            $this->db->select('*');
            $this->db->from(tablename('admin'));
            $this->db->where('emailid', addslashes(trim($email_id)));
            $this->db->where('password', $password);

            $admin_query = $this->db->get();
            $admin_result = $admin_query->row();

            $admin_id = $admin_result->id;
            $login_date_time = date('Y-m-d H:i:s');

            $admin_arr = (array) $admin_result;
            $js_admin_array = json_encode($admin_arr);

            if($auth_result->is_subadmin=='Y'){
              //$type = 'SubAdmin';
              //$role = explode('##', $auth_result->role);
              $type = 'Admin';
              $role = array();
              $is_subadmin = $auth_result->is_subadmin;
            }else{
              $type = 'Admin';
              $role = array();
              $is_subadmin = $auth_result->is_subadmin;
            }

            $_login_array_admin = (object) ['uid' => $admin_id, 'type' => $type, 'role' => $role, 'is_subadmin'=>$is_subadmin, 'detail' => $js_admin_array];

            $this->session->set_userdata('admin_uid', $admin_id);

            $this->session->set_userdata('admin_detail', $js_admin_array);
            //$this->session->set_userdata('admin_logid', $log_id);

            $this->session->unset_userdata('admin');
            $this->session->set_userdata('is_subadmin', $is_subadmin);
            $this->session->set_userdata('admin', $_login_array_admin);


            $this->session->set_flashdata('successmessage', 'You have logged in successfully');
            //redirect(base_url('admin-student-list'));
            if(empty($role)){
              redirect(base_url('admin-allotment-list'));
            }else{
              if($role[0]=='Student'){
                redirect(base_url('admin-allotment-list'));
              }elseif($role[0]=='Allotment'){
                redirect(base_url('admin-allotmentcard-list'));
              }elseif($role[0]=='Reissue'){
                redirect(base_url('admin-reissue-card-list'));
              }elseif($role[0]=='All Payment'){
                redirect(base_url('admin-payment-report-list'));
              }elseif($role[0]=='Application Payment'){
                redirect(base_url('admin-payment-list'));
              }
            }

            
/*
            $this->session->set_flashdata('successmessage', 'You have logged in successfully');
            redirect(base_url('admin_dashboard'));*/
        }

        $this->session->set_flashdata('errormessage', 'Invalid Credentials');
        redirect(base_url('admin'));
    }

    
    public function admin_logout() {
        $admin_uid = $this->session->userdata('admin_uid');
        $admin_logid = $this->session->userdata('admin_logid');
        $modified_date = date('Y-m-d H:i:s');

       /* $update_logs = array('logout_datetime' => $modified_date);
        $this->db->where('id', $admin_logid);
        $this->db->update(tablename('logs'), $update_logs);*/

        $update_admin = array('ip_address' => '',
            'user_agent' => '',
            'online_status' => '0',
            'last_login' => $modified_date,
            'modified_date' => $modified_date
        );

        $this->db->where('id', $admin_uid);

        if ($this->db->update(tablename('admin'), $update_admin)) {
            $this->session->set_userdata('admin_uid', '');
            $this->session->set_userdata('admin_detail', '');
            $this->session->set_userdata('admin_logid', '');

            $this->session->set_flashdata('successmessage', 'You have logged out successfully');
            redirect(base_url('admin'));
        } else {
            return "";
        }
    }

    
    public function admin_forgot_password() {
      //echo "<pre>";print_r($this->input->post());exit;
      $emailid = $this->input->post('reset_emailid');

      if (!empty($emailid)) {
        $this->db->select('*');
        $this->db->from(tablename('admin'));
        $this->db->where('emailid', addslashes(trim($emailid)));
        $this->db->where('id', 1);

        $query = $this->db->get();
        $admin_result = $query->row();

        if (!empty($admin_result)) {
          $new_password = "VS_" . $admin_result->id . time();
          $new_encrypted_password = md5($new_password);

          $update_data = array(
              'password' => $new_encrypted_password
          );

          $this->db->where('id', $admin_result->id);
          $this->db->update(tablename('admin'), $update_data);

          // Email
          $this->load->helper('email');
          $subject = 'Password has been Reset';
          $to = $emailid;
          $data['body'] = 'Hello ' . $admin_result->fname . ',<br/><br/><p>Your password has been reset. The new password is <b>' . $new_password . '</b>. Please use this next time you log in. Make sure to change yor password again to avoid any potential mishap. <b>For security reasons, do not share your password with anyone</b> </p>';
          send_email($to, $subject, $data);

          $this->session->set_flashdata('successmessage', "Check your email for new password.");

          return $admin_result->id;
        } else {
          $this->session->set_flashdata('errormessage', "Incorrect Email Id or Password.");
          redirect(base_url('admin_forgot_password'));
        }
      } else {
        $this->session->set_flashdata('errormessage', "Incorrect Email Id or Password.");
        redirect(base_url('admin_forgot_password'));
      }
    }

    
  

   
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

    public function get_rows_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->result();
    }

    
    public function update_row_data($table, $data, $where) {
        $query = $this->db->update(tablename($table), $data, $where);
        return true;
    }

    public function modify_passwod($id){
           $old_password                 = $this->input->post('old_password');
           $password                     = $this->input->post('new_password');
           $this->db->select('*');
           $this->db->from(tablename('admin'));
           $this->db->where('id', $id);
           $this->db->where('password', md5($old_password));
           $query1     = $this->db->get();
           $admin_res   = $query1->row();
           
       if (!empty($admin_res)) {
           $data = array(
               'password'          => md5($password)
           );
           $this->db->where('id', $admin_res->id)->update(tablename('admin'), $data);
           return $admin_res->id;
       }else{
          return FALSE;
       }
  }


}

/* End of file authmodel.php */
/* Location: ./application/models/admin/Adminauthmodel.php */