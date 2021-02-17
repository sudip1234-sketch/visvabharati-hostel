<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class MessChargeModel extends CI_Model {

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
     * <p>This function loads all the user that has been added by current admin [Table: ]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('t1.id as t1_id,t1.start_year as t1_start_year,t1.end_year as t1_end_year,t2.*,t3.hostel_name');
        $this->db->from(tablename('mess_charge_session')." as t1");
        $this->db->join(tablename('mess_charge_fee') . ' as t2', 't1.id = t2.mess_session_id', 'left'); 
        $this->db->join(tablename('hostel') . ' as t3', 't1.hostel_id = t3.id', 'left');        
        $this->db->order_by("t1.start_year", "asc");
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

   

   

      /**
     * Used for modify of user 
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: ]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

     public function modify($id = '') {
        
        $id                           = $this->input->post('ad_id');
        $hostel_id                    = $this->input->post('hostel_id');        

        $start_year                   = $this->input->post('st_yr');
        $end_year                     = $this->input->post('en_yr');


        // $july                         = $this->input->post('july');
        // $august                       = $this->input->post('august');
        // $september                    = $this->input->post('september');
        // $october                      = $this->input->post('october');
        // $november                     = $this->input->post('november');
        // $december                     = $this->input->post('december');
        // $january                      = $this->input->post('january');
        // $february                     = $this->input->post('february');
        // $march                        = $this->input->post('march');
        // $april                        = $this->input->post('april');
        // $may                          = $this->input->post('may');
        // $june                         = $this->input->post('june');

        $july_A =  $this->input->post('july_A');
        $july_B =  $this->input->post('july_B');
        $july_C =  $this->input->post('july_C');
        $august_A =  $this->input->post('august_A');
        $august_B =  $this->input->post('august_B');
        $august_C =  $this->input->post('august_C');
        $september_A =  $this->input->post('september_A');
        $september_B =  $this->input->post('september_B');
        $september_C =  $this->input->post('september_C');
        $october_A =  $this->input->post('october_A');
        $october_B =  $this->input->post('october_B');
        $october_C =  $this->input->post('october_C');
        $november_A =  $this->input->post('november_A');
        $november_B =  $this->input->post('november_B');
        $november_C =  $this->input->post('november_C');
        $december_A =  $this->input->post('december_A');
        $december_B =  $this->input->post('december_B');
        $december_C =  $this->input->post('december_C');
        $january_A =  $this->input->post('january_A');
        $january_B =  $this->input->post('january_B');
        $january_C =  $this->input->post('january_C');
        $february_A =  $this->input->post('february_A');
        $february_B =  $this->input->post('february_B');
        $february_C =  $this->input->post('february_C');
        $march_A =  $this->input->post('march_A');
        $march_B =  $this->input->post('march_B');
        $march_C =  $this->input->post('march_C');
        $april_A =  $this->input->post('april_A');
        $april_B =  $this->input->post('april_B');
        $april_C =  $this->input->post('april_C');
        $may_A =  $this->input->post('may_A');
        $may_B =  $this->input->post('may_B');
        $may_C =  $this->input->post('may_C');
        $june_A =  $this->input->post('june_A');
        $june_B =  $this->input->post('june_B');
        $june_C =  $this->input->post('june_C'); 

        if (!empty($id)) {
            $data = array(
                        'july_A' => $july_A,
                        'july_B' => $july_B,
                        'july_C' => $july_C,
                        'august_A' => $august_A,
                        'august_B' => $august_B,
                        'august_C' => $august_C,
                        'september_A' => $september_A,
                        'september_B' => $september_B,
                        'september_C' => $september_C,
                        'october_A' => $october_A,
                        'october_B' => $october_B,
                        'october_C' => $october_C,
                        'november_A' => $november_A,
                        'november_B' => $november_B,
                        'november_C' => $november_C,
                        'december_A' => $december_A,
                        'december_B' => $december_B,
                        'december_C' => $december_C,
                        'january_A' => $january_A,
                        'january_B' => $january_B,
                        'january_C' => $january_C,
                        'february_A' => $february_A,
                        'february_B' => $february_B,
                        'february_C' => $february_C,
                        'march_A' => $march_A,
                        'march_B' => $march_B,
                        'march_C' => $march_C,
                        'april_A' => $april_A,
                        'april_B' => $april_B,
                        'april_C' => $april_C,
                        'may_A' => $may_A,
                        'may_B' => $may_B,
                        'may_C' => $may_C,
                        'june_A' => $june_A,
                        'june_B' => $june_B,
                        'june_C' => $june_C   
            );

            //echo "<pre>"; print_r($data); die;
            $this->db->where('id', $id)->update(tablename('mess_charge_fee'), $data);
            return $id;
        } else {

            if(!empty($hostel_id)){
                foreach ($hostel_id as $value) {
            $data = array(
                'hostel_id'   => $value,
                'start_year'  => $start_year,
                'end_year'    => $end_year                
            );

            $this->db->insert(tablename('mess_charge_session'), $data);
            $session_id = $this->db->insert_id();

            $data_session = array(
                'mess_session_id' => $session_id,
                'july_A' => $july_A,
                'july_B' => $july_B,
                'july_C' => $july_C,
                'august_A' => $august_A,
                'august_B' => $august_B,
                'august_C' => $august_C,
                'september_A' => $september_A,
                'september_B' => $september_B,
                'september_C' => $september_C,
                'october_A' => $october_A,
                'october_B' => $october_B,
                'october_C' => $october_C,
                'november_A' => $november_A,
                'november_B' => $november_B,
                'november_C' => $november_C,
                'december_A' => $december_A,
                'december_B' => $december_B,
                'december_C' => $december_C,
                'january_A' => $january_A,
                'january_B' => $january_B,
                'january_C' => $january_C,
                'february_A' => $february_A,
                'february_B' => $february_B,
                'february_C' => $february_C,
                'march_A' => $march_A,
                'march_B' => $march_B,
                'march_C' => $march_C,
                'april_A' => $april_A,
                'april_B' => $april_B,
                'april_C' => $april_C,
                'may_A' => $may_A,
                'may_B' => $may_B,
                'may_C' => $may_C,
                'june_A' => $june_A,
                'june_B' => $june_B,
                'june_C' => $june_C                 
            );
            $this->db->insert(tablename('mess_charge_fee'), $data_session);

        } }


            //echo $this->db->last_query(); exit;
            return true;
        }
    }

     function isunique($where,$where_in) 
    {
      
        $c = $this->db->where($where)->where($where_in)->get(tablename('mess_charge_session'))->result();
        //echo $this->db->last_query(); exit; 

        return count($c) === 0 ? TRUE : FALSE;
    }


     public function load_single_data($id) {
        $this->db->select('t1.id as t1_id,t1.hostel_id,t1.start_year as t1_start_year,t1.end_year as t1_end_year,t2.*,t3.hostel_name');
        $this->db->from(tablename('mess_charge_session')." as t1");
        $this->db->join(tablename('mess_charge_fee') . ' as t2', 't1.id = t2.mess_session_id', 'left'); 
        $this->db->join(tablename('hostel') . ' as t3', 't1.hostel_id = t3.id', 'left');    
        $this->db->where("t1.id", $id );   
        $this->db->order_by("t1.start_year", "asc");
        $query = $this->db->get();
        $result = $query->row();
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function delete() {

      $id  = $this->input->post('del_ad_id');
      $this->db->where('id', $id);
      $this->db->delete(tablename('mess_charge_session')); 

      $this->db->where('mess_session_id', $id);
      $this->db->delete(tablename('mess_charge_fee')); 

      return true;
    }

}
/* End of file MessChargeModel.php */
/* Location: ./application/modules/MessCharge/models/admin/MessChargeModel.php */