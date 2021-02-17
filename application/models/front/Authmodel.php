<?php
class Authmodel extends CI_Model {

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

    
    /**
     * Used for the log-in functionality of an user
     *
     * <p>Description</p>
     *
     * <p>This function uses the Global Array POST, fetches the variables containing the credential of an user
     * and validates them against the same [Table: Visvabharati]. If validation is a success, 
     * the user gets redirected to the index and the users details gets saved into session</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function user_login() {

        $student_id = $this->input->post('student_id');
        $password = md5($this->input->post('password'));
        $this->db->select('*');
        $this->db->from(tablename('student'));
        $this->db->where('student_id', $student_id);
        $this->db->where('password', $password);
       
        $query = $this->db->get();
        $user_result = $query->row();

        if (!empty($user_result)) {
            $_login_array_userdata = (object) ['uid' => $user_result->id, 'detail' => $user_result];
            $this->session->set_userdata('front', $_login_array_userdata);
            $this->session->set_userdata('userFullName', $user_result->full_name);
            $this->session->set_userdata('userid', $user_result->id);
            $this->session->set_userdata('successmessage', 'Successfully logged in!');
            redirect(base_url('student-profile'));
        } else {
            $this->session->set_userdata('errormessage', 'Invalid Credentials!');
            redirect(base_url('login'));
        }
    }

    /**
     * Used for fetching one row from a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches one row from any table depending upon condition</p>
     *
     * @access  public
     * @param none
     * @return array
     */
    public function get_row_data($table, $where) {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }

    /**
     * Used for updating one row in a table
     *
     * <p>Description</p>
     *
     * <p>This function fetches update one row in table depending upon condition</p>
     *
     * @access  public
     * @param none
     * @return array
     */
    public function update_row_data($table, $data, $where) {
        $query = $this->db->update(tablename($table), $data, $where);
        return true;
    }

    /**
     * Used for insert data in any table
     *
     * <p>Description</p>
     *
     * <p>This function used for insert data in any table</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function insert_data($table, $data) {
        $this->db->insert(tablename($table), $data);
        return $this->db->insert_id();
    }


    public function modify_passwod($id){
           $old_password                 = $this->input->post('old_password');
           $password                     = $this->input->post('new_password');
           $this->db->select('*');
           $this->db->from(tablename('student'));
           $this->db->where('id', $id);
           $this->db->where('password', md5($old_password));
           $query1     = $this->db->get();
           $admin_res   = $query1->row();
       if (!empty($admin_res)) {
           $data = array(
               'password'          => md5($password)
           );
           $this->db->where('id', $admin_res->id)->update(tablename('student'), $data);
           return $id;
       }else{
            return FALSE;
       }
  }

    

}

/* End of file authmodel.php */
/* Location: ./application/models/front/authmodel.php */