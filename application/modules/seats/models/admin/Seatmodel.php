<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Seatmodel extends CI_Model {

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
        $this->db->select('st.*');
        $this->db->from(tablename('seats_available')." as st");
        $this->db->order_by("id", "asc");

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
     * Used for modify of seats 
     *
     * <p>Description</p>
     *
     * <p>This function updates seat values [Table: vb_seats_available]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

    public function modify($id = '') {
        //echo "<pre>"; print_r($_POST); //die;

       $id                              = $this->input->post('hostel_name');
       $total_seats                     = $this->input->post('total_seats');
       $total_seats_final               = $this->input->post('total_seats_final');
       


       $total_seats_booked              = $this->input->post('seats_booked');
       $total_seats_remaining           = $this->input->post('seats_remaining');
       $release_seats_in_percent        = $this->input->post('release_seats_in_percent');
       $seats_available_after_release   = $this->input->post('seats_available_after_release');
       // $seats_not_released              = (!empty($this->input->post('seats_not_released'))?$this->input->post('seats_not_released'):0);
        $seats_not_released              = ($total_seats_final - $seats_available_after_release);
       
       $seatIdsForSave = $this->input->post('seatIdsForSave');


       $where = array();
       $where['hostel_id'] = $id;
       $query = $this->db->get_where(tablename('seats_available'), $where);
       $seat_exist = $query->row();

        if(!empty($seat_exist)) {
            $data = array(
               
                'total_seats'                       => $total_seats_final,
                'total_seats_booked'                => $total_seats_booked,
                'total_seats_remaining'             => $total_seats_remaining,
                'release_seats_in_percent'          => $release_seats_in_percent,
                'seats_available_after_release'     => $seats_available_after_release,
                'seats_not_released'                => $seats_not_released
               
            );

            $this->db->where('hostel_id', $id)->update(tablename('seats_available'), $data);
            // activate seats data

            if($seatIdsForSave!=''){
                $seatIdsForSave_ARR = explode('@@', $seatIdsForSave);
                $data_seats = array('is_active'=> 1);

                $all_seats= $this->db->select('SUM(no_of_seats) as totseat')->where('hostel_id',$id)->get('hostel_rooms_seats')->row(); 
                
                if($all_seats->totseat == $total_seats_final){
                foreach ($seatIdsForSave_ARR as $valSeat) {
                   $this->db->where('id', $valSeat)->update(tablename('hostel_rooms_seats'), $data_seats);
                }
            }
                
            } 
            

            return $id;
        } else {
            $data = array(
               
                'hostel_id'                     => $id,
                'total_seats'                   => $total_seats_final,
                'total_seats_booked'            => $total_seats_booked,
                'total_seats_remaining'         => $total_seats_remaining,
                'release_seats_in_percent'      => $release_seats_in_percent,
                'seats_available_after_release'  => $seats_available_after_release,
                'seats_not_released'            => $seats_not_released
               
            );


            $this->db->insert(tablename('seats_available'), $data);
             if($seatIdsForSave!=''){
                $seatIdsForSave_ARR = explode('@@', $seatIdsForSave);
                $data_seats = array('is_active'=> 1);
                $all_seats= $this->db->select('SUM(no_of_seats) as totseat')->where('hostel_id',$id)->get('hostel_rooms_seats')->row(); 
                if($all_seats->totseat == $total_seats_final){
                foreach ($seatIdsForSave_ARR as $valSeat) {
                    $this->db->where('id', $valSeat)->update(tablename('hostel_rooms_seats'), $data_seats);
                }
                }
            } 


             // save release bed nos
      $bed_nos   = $this->Seatmodel->get_result_data('hostel_rooms_seats',array('hostel_id'=> $id,'is_active'=>'1','block'=>'0'));
        $save_bed_no = 0;


    if(!empty($bed_nos)){
        foreach ($bed_nos as $value) {
            
            $exp_beds = explode(', ', $value->beds_nos);
            if($total_seats_remaining!=$seats_available_after_release){
             
            if($value->no_of_seats < $seats_available_after_release){ // less               
                    if($save_bed_no==0){
                    $save_bed_no += $value->no_of_seats; 
                    $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>$value->beds_nos)); 
                    }else{

                        $get_beds = array();
                        $rest_bed = $seats_available_after_release - $save_bed_no;
                        if($rest_bed <= $value->no_of_seats){
                        for ($i=0; $i < $rest_bed; $i++) { 
                            array_push($get_beds, $exp_beds[$i]);
                        }
                        $save_bed_no += count($get_beds); 
                        $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds)));
                        break;
                    }else{
                        for ($i=0; $i < $value->no_of_seats; $i++) { 
                            array_push($get_beds, $exp_beds[$i]);
                        }
                        $save_bed_no += count($get_beds); 
                        $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds)));
                    }
                        
                    }

                } else if($value->no_of_seats >= $seats_available_after_release){ // greater
                    
                    $this->db->where('hostel_id', $id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>'')); 

                    $get_beds = array();
                    for ($i=0; $i < $seats_available_after_release; $i++) { 
                        array_push($get_beds, $exp_beds[$i]);
                    }
                    $save_bed_no += count($get_beds); 
                    //echo "<pre>"; print_r($get_beds); die;
                    $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>implode(", ", $get_beds))); 
                    break;
                }   


            }else{
                $this->db->where('id', $value->id)->update(tablename('hostel_rooms_seats'), array('release_beds_nos'=>$value->beds_nos)); 
            }         
        }
      }


   // end save release bed nos


            
            return $this->db->insert_id();
        }
    }


public function show_current_student() {
        $this->db->select('*');
        $this->db->from(tablename('student'));
        $this->db->where("hostel_name", @$_GET['hostel']);
        $this->db->where("block_no", @$_GET['block']);
        $this->db->where("floor_no", @$_GET['floor']);
        $this->db->where("room_no", @$_GET['room']);
        $this->db->where("bed_no", @$_GET['bed']);
        $this->db->where("bed_released", '0');
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        $result = $query->row();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }

    public function releaseBed($id,$seatId,$bedno) { 

        $this->db->select('*');
        $this->db->from(tablename('hostel_rooms_seats'));
        $this->db->where("id", $seatId);
        $query = $this->db->get();
        $result = $query->row();

        //echo "<pre>"; print_r($result); //die; 
        $bed_released = explode(',', $result->booked_bed_nos);

        if (($key = array_search($bedno, $bed_released)) !== false) {
            unset($bed_released[$key]);
        }
        //echo "<pre>"; print_r($bed_released); die; 

          $update = array('bed_released' => '1');
          $this->db->where('id', $id);
          if ($this->db->update(tablename('student'), $update)) {
            $bed_released_save = implode(',', $bed_released);
        $update1 = array('booked_bed_nos' => $bed_released_save);
        $this->db->where('id', $seatId);
        $this->db->update(tablename('hostel_rooms_seats'), $update1);

              return 1;
          } else {
              return;
          }
      
    }
}
/* End of file Seatsmodel.php */
/* Location: ./application/modules/settings/models/admin/Seatsmodel.php */