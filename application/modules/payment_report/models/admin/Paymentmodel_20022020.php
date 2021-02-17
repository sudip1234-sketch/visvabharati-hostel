<?php

/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Paymentmodel extends CI_Model {

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


        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');

        $from_date              = date('Y-d-m',strtotime($this->input->get('from_date')));
        $to_date                = date('Y-d-m',strtotime($this->input->get('to_date')));

        if($from_date == '1970-01-01')
        {
            $from_date = '';
        }

        if($to_date == '1970-01-01')
        {
            $to_date = '';
        }

       
        $this->db->select("pd.*,stu.full_name,stu.student_id as stid,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name"); 
        $this->db->from(tablename('payment_details') . ' as pd');     
        $this->db->join("student as stu","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = pd.hostel_id",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");

/*
        $this->db->select("pd.*,stu.full_name,stu.student_id as stid,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name"); 
        $this->db->from(tablename('student') . ' as stu');     
        $this->db->join("payment_details as pd","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = stu.hostel_name",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");*/



        if(!empty($allotment_type_search) && $allotment_type_search=='new_applied')
        {
            $this->db->where('stu.is_approved',0);
        }

        if(!empty($allotment_type_search) && $allotment_type_search=='already_alloted')
        {
            $this->db->where('stu.is_approved',1);
        }

        if(!empty($search_by_bhavan))
        {
            $this->db->where('stu.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('stu.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('stu.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('stu.gender',$gender);
        }

        if(isset($search_by_pwd))
        {
            $this->db->where('stu.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('stu.nationality_type',$search_nationality_type);
        }


        //echo $from_date; exit;


        if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_start >=', $from_date);
            $this->db->where('pd.plan_month_end <=', $to_date);
        }

        /*if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_start >=', $from_date);
            $this->db->where('pd.plan_month_start <=', $to_date);
        }

        if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_end >=', $from_date);
            $this->db->where('pd.plan_month_end <=', $to_date);
        }*/

       

        // $this->db->where('pd.form_type','mess_food');
        $this->db->order_by("pd.id", "desc");
        $this->db->where('pd.sbi_payment_status',1);

        $query = $this->db->get();

        $result=$query->result();

        //echo $this->db->last_query(); exit;

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

    public function payment_data($id) {

        $this->db->select("pd.*"); 
        $this->db->from(tablename('payment_details') . ' as pd');
        $this->db->where('pd.form_type','mess_food');
        $this->db->where('pd.student_id',$id);
        $this->db->order_by("pd.plan_month_start", "desc");

        $query = $this->db->get();
        $result=$query->row();     
        return $result;
    }




   

      /**
     * Used for modify of user 
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: dd_user]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

     public function modify($id = '') {

        $id                         = $this->input->post('id');
        $student_id                 = $this->input->post('student_id');
        $hostel_id                  = $this->input->post('student_hostel_name');
        $total_amount               = $this->input->post('total_amount');
        $total_paid                 = $this->input->post('total_paid');
        $total_overdue              = $this->input->post('total_overdue');
   
     
        if (!empty($id)) {
            $data = array(
                'student_id'            => $student_id,
                'hostel_id'             => $hostel_id,
                'total_amount'          => $total_amount,
                'total_paid'            => $total_paid,
                'total_overdue'         => $total_overdue
            );

            $this->db->where('id', $id)->update(tablename('payment_details'), $data);
            return $id;
        } else {
            $data = array(
                'student_id'            => $student_id,
                'hostel_id'             => $hostel_id,
                'total_amount'          => $total_amount,
                'total_paid'            => $total_paid,
                'total_overdue'         => $total_overdue
            );
            $this->db->insert(tablename('payment_details'), $data);
            return $this->db->insert_id();
        }
    }


 public function load_all_payment_hostel() {
    $current_month ="(MONTH(`pd`.`plan_month_end`) = MONTH(CURRENT_DATE()) AND YEAR(`pd`.`plan_month_end`) = YEAR(CURRENT_DATE()))";

        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');


       
        $this->db->select("pd.*,stu.full_name,stu.student_id,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name"); 
        $this->db->from(tablename('payment_details') . ' as pd');     
        $this->db->join("student as stu","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = pd.hostel_id",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");


        $this->db->where($current_month);



        if(!empty($allotment_type_search) && $allotment_type_search=='new_applied')
        {
            $this->db->where('stu.allotment_assigned',0);
        }

        if(!empty($allotment_type_search) && $allotment_type_search=='already_alloted')
        {
            $this->db->where('stu.allotment_assigned',1);
        }

        if(!empty($search_by_bhavan))
        {
            $this->db->where('stu.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('stu.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('stu.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('stu.gender',$gender);
        }

        if(isset($search_by_pwd))
        {
            $this->db->where('stu.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('stu.nationality_type',$search_nationality_type);
        }


        $this->db->order_by("pd.id", "desc");

        $query = $this->db->get();

       // echo $this->db->last_query(); die;

        $result=$query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


 public function load_all_payment_mess() {
    $current_month ="(MONTH(`pd`.`plan_month_end`) = MONTH(CURRENT_DATE()) AND YEAR(`pd`.`plan_month_end`) = YEAR(CURRENT_DATE()))";

        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');


       
        $this->db->select("pd.*,stu.full_name,stu.student_id,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name"); 
        $this->db->from(tablename('payment_details') . ' as pd');     
        $this->db->join("student as stu","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = pd.hostel_id",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");


        $this->db->where($current_month);



        if(!empty($allotment_type_search) && $allotment_type_search=='new_applied')
        {
            $this->db->where('stu.allotment_assigned',0);
        }

        if(!empty($allotment_type_search) && $allotment_type_search=='already_alloted')
        {
            $this->db->where('stu.allotment_assigned',1);
        }

        if(!empty($search_by_bhavan))
        {
            $this->db->where('stu.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('stu.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('stu.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('stu.gender',$gender);
        }

        if(isset($search_by_pwd))
        {
            $this->db->where('stu.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('stu.nationality_type',$search_nationality_type);
        }


        $this->db->order_by("pd.id", "desc");

        $query = $this->db->get();

       // echo $this->db->last_query(); die;

        $result=$query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function load_all_data_excel() {


        $allotment_type_search  = $this->input->get('allotment_type_search');
        $search_by_bhavan       = $this->input->get('search_by_bhavan');
        $search_by_department   = $this->input->get('search_by_department');
        $search_by_course       = $this->input->get('search_by_course');
        $gender                 = $this->input->get('gender');
        $search_by_pwd          = $this->input->get('search_by_pwd');
        $search_nationality_type= $this->input->get('search_nationality_type');

        $from_date              = date('Y-d-m',strtotime($this->input->get('from_date')));
        $to_date                = date('Y-d-m',strtotime($this->input->get('to_date')));

        if($from_date == '1970-01-01')
        {
            $from_date = '';
        }

        if($to_date == '1970-01-01')
        {
            $to_date = '';
        }

       
        $this->db->select("pd.*,stu.full_name,stu.student_id as stid,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name,stu.caste_type,stu.room_no"); 
        $this->db->from(tablename('payment_details') . ' as pd');     
        $this->db->join("student as stu","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = pd.hostel_id",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");

/*
        $this->db->select("pd.*,stu.full_name,stu.student_id as stid,hst.hostel_code,hst.hostel_name,stu.academic_year,
            dept.department_name,course.course_name,stu.gender,institute.institute_name"); 
        $this->db->from(tablename('student') . ' as stu');     
        $this->db->join("payment_details as pd","stu.id = pd.student_id",'LEFT'); 
        $this->db->join("hostel as hst","hst.id = stu.hostel_name",'LEFT');
        $this->db->join(tablename('department')." as dept","dept.id = stu.department_id");
        $this->db->join(tablename('course')." as course","course.id = stu.course_id");
        $this->db->join(tablename('institute')." as institute","institute.id = stu.institute_id");*/



        if(!empty($allotment_type_search) && $allotment_type_search=='new_applied')
        {
            $this->db->where('stu.is_approved',0);
        }

        if(!empty($allotment_type_search) && $allotment_type_search=='already_alloted')
        {
            $this->db->where('stu.is_approved',1);
        }

        if(!empty($search_by_bhavan))
        {
            $this->db->where('stu.institute_id',$search_by_bhavan);
        }

        if(!empty($search_by_department))
        {
            $this->db->where('stu.department_id',$search_by_department);
        }

        if(!empty($search_by_course))
        {
            $this->db->where('stu.course_id',$search_by_course);
        }

        if(!empty($gender))
        {
            $this->db->where('stu.gender',$gender);
        }

        if(isset($search_by_pwd))
        {
            $this->db->where('stu.pwd_status',$search_by_pwd);
        }

        if(!empty($search_nationality_type))
        {
            $this->db->where('stu.nationality_type',$search_nationality_type);
        }


        //echo $from_date; exit;


        if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_start >=', $from_date);
            $this->db->where('pd.plan_month_end <=', $to_date);
        }

        /*if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_start >=', $from_date);
            $this->db->where('pd.plan_month_start <=', $to_date);
        }

        if(!empty($from_date) && !empty($to_date))
        {
            $this->db->where('pd.plan_month_end >=', $from_date);
            $this->db->where('pd.plan_month_end <=', $to_date);
        }*/

       

        // $this->db->where('pd.form_type','mess_food');
        $this->db->order_by("pd.id", "desc");
        $this->db->where('pd.sbi_payment_status',1);

        $query = $this->db->get();

        $result=$query->result();

        // echo $this->db->last_query(); exit;

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
        
    }

     public function get_payment_details($id) {
       $this->db->select('t1.*,t2.full_name as stName,t2.student_id as stId,t2.hostel_id,t2.gender,t2.hostel_name,t2.block_no,t2.floor_no,t2.room_no,t2.bed_no,t2.course_id,t2.institute_id,t2.department_id,t3.course_name,t4.hostel_name as HostelName,t2.date_of_allotment,t2.vacating_year');
        $this->db->from(tablename('payment_details')." as t1");
        $this->db->join(tablename('student')." as t2","t2.id = t1.student_id");
        $this->db->join(tablename('course')." as t3","t3.id = t2.course_id");
        $this->db->join(tablename('hostel')." as t4","t4.id = t2.hostel_name");

        $this->db->where('t1.id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */