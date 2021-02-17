<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class CompletedStudentmodel extends CI_Model {

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
    public function get_row_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }




     // @b
    public function load_all_student_by_hostelid(){
        $hostel_id       = $this->input->get('search_by_hostel');

        $this->db->select('S.full_name, S.student_id, S.semester, S.course_id, C.total_year, C.course_name');
        $this->db->from(tablename('student')." as S");
        $this->db->join(tablename('course')." as C","C.id = S.course_id");
         $this->db->where('S.hostel_name', $hostel_id);
         $this->db->where('S.status', 1);
        $query = $this->db->get();
        $result = $query->result();
       
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */