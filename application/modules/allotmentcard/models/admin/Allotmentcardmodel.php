<?php

/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Allotmentcardmodel extends CI_Model {

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
        $search_keyword = $this->input->get('search_keyword');

        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname,
            hs.hostel_name');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");
        $this->db->join(tablename('hostel')." as hs","hs.id = st.hostel_name");
        if(!empty($search_keyword)) {
            $this->db->like('st.full_name', $search_keyword);
            $this->db->or_like('st.student_id', $search_keyword);
        }

        $this->db->order_by("final_score", "desc");

        $query = $this->db->get();
        $result = $query->result();

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
    public function get_row_data($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }


    public function get_row_data1($id) {
       
        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,hostel.hostel_name,bg.name as blood_group,hostel_floor.floor_name,hostel_block.block_name');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('hostel')." as hostel","hostel.id = st.hostel_name",'left');
        $this->db->join(tablename('hostel_floor')." as hostel_floor","hostel_floor.id = st.floor_no",'left');
        $this->db->join(tablename('hostel_block')." as hostel_block","hostel_block.id = st.block_no",'left');
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");
        $this->db->where('st.id',$id);

        $query = $this->db->get();
        $result = $query->row();

        $result->date_of_birth = date('d-m-Y',strtotime($result->date_of_birth)); 
        return $result;
    }



   
    


   



}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */