<?php

/**
 * Application Report Model Class. Handles all the datatypes and methodes required for handling Application Report
 */
class AllotmentReportmodel extends CI_Model {

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
        $this->load->helper('string','email_helper');
    }

    /**
     * Used for loading functionality of student for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the student that has been added by current admin [Table: vb_student]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {

      //echo "<pre>";print_r($_GET);//exit;

        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');
        $search_by_hostel       = $this->input->get('search_by_hostel');
        $search_by_category     = $this->input->get('search_by_category');

        $search_semester = $this->input->get('search_semester');
        $search_by_year = $this->input->get('search_by_year');
       
        $this->db->select('st.*,dept.department_name,course.course_name,inst.institute_name,bg.name as bloodgroupname');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('bloodgroup')." as bg","bg.id = st.blood_group");

        
        $this->db->where('st.allotment_assigned',1);
      

        if(!empty($search_by_bhavan))
        {
            $this->db->where('st.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('st.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('st.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('st.gender',$gender);
        }

         if(isset($search_by_pwd) && $search_by_pwd!='')
        {
            $this->db->where('st.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('st.nationality_type',$search_nationality_type);
        }

        if(!empty($search_by_hostel))
        {
            $this->db->where('st.hostel_name',$search_by_hostel);
        }

        if(!empty($search_by_category))
        {
            $this->db->where('st.caste_type',$search_by_category);
        }

        if(!empty($search_semester))
        {
            $this->db->where('st.semester',$search_semester);
        } 

        if(!empty($search_by_year))
        {
            $this->db->where('year(st.date_of_allotment)',$search_by_year);
        }      


        $this->db->order_by("final_score", "desc");

        $query = $this->db->get();
        $result = $query->result();

        //echo $this->db->last_query(); exit;     

        //echo "<pre>";print_r($result);exit;

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
    public function get_row_result($table, $where = "1=1") {
        $query = $this->db->get_where(tablename($table), $where);
        return $query->row();
    }
    
}
/* End of file AllotmentReportmodel.php */
/* Location: ./application/modules/application_report/models/admin/AllotmentReportmodel.php */