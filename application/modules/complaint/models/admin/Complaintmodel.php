<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Complaintmodel extends CI_Model {

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
       
        $this->db->select('sc.*,ct.complaint_name,s.full_name,hos.hostel_name');
        $this->db->from(tablename('student_complaints')." as sc");
        $this->db->join(tablename('student')." as s","s.id = sc.student_id",'left');
        $this->db->join(tablename('hostel')." as hos","hos.id = s.hostel_name",'left');
        $this->db->join(tablename('complaint_type')." as ct","ct.id = sc.complaint_id");
        $this->db->order_by("sc.is_read", "asc");
        $this->db->order_by("sc.complaint_date", "desc");
       
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
    public function get_row_data($id) {

    	//echo 'test'; exit;

        $this->db->select('sc.*,ct.complaint_name,s.full_name');
        $this->db->from(tablename('student_complaints')." as sc");
        $this->db->join(tablename('student')." as s","s.id = sc.student_id");
        $this->db->join(tablename('complaint_type')." as ct","ct.id = sc.complaint_id");
      	$this->db->where('sc.id',$id);

      	$query = $this->db->get();
        $result = $query->row();
        return $result;
    }


    /**
     * Used for delete functionality of user for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: dd_user]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function delete() {

      $id  = $this->input->post('del_ad_id');

      $this->db->where('id', $id);
      $this->db->delete('student_complaints'); 

      return true;
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

        $id                              = $this->input->post('ad_id');
        $name                            = $this->input->post('name');
        $designation                     = $this->input->post('designation');
        $email                           = $this->input->post('email');
        $phone                           = $this->input->post('phone');
        $fax                             = $this->input->post('fax');


        $uploadPath   =  $_SERVER['DOCUMENT_ROOT'].'/visvabharati/assets/front/upload/administration/';
        $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 

        if(!empty($_FILES['image']['name']))
        {
            
            $this->load->library('upload');
            $config['upload_path']      = $uploadPath;
            $config['allowed_types']    = $allowedTypes;
            $config['file_name']        = time();
            $this->upload->initialize($config);


            if($_FILES['image']['error']==0)
            {
                $picName=$_FILES['image']['name']; 
                $ext = end((explode(".", $_FILES['image']['name']))); 
            
                 // generate a unique file name
                $rand = md5(uniqid($picName, true));
              
                $newPicName=$rand.'.'.$ext;
              
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($_FILES['image']['tmp_name'] ,$destination))
                {
                    
                    $image_name = $newPicName;
                }
            }

        }
        else
        {
            $image_name = '';
        }


      
        if (!empty($id)) {
            $data = array(
                'name'              => $name,
                'designation'       => $designation,
                'email'             => $email,
                'phone'             => $phone,
                'image'             => $image_name,
                'fax'               => $fax
            );

            $this->db->where('id', $id)->update(tablename('administration'), $data);
            return $id;
        } else {
            $data = array(
                'name'              => $name,
                'designation'       => $designation,
                'email'             => $email,
                'phone'             => $phone,
                'image'             => $image_name,
                'fax'               => $fax
                 
            );

            $this->db->insert(tablename('administration'), $data);
            return $this->db->insert_id();
        }
    }



    /**
     * Used for change status functionality of user for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, check the current user status
     * and change it the the opposite [Table: dd_user]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function readstatus() {

      $id  = $this->input->post('id');

      $this->db->select('*');
      $this->db->from(tablename('student_complaints'));
      $this->db->where('id', $id);
      
      $query = $this->db->get();
      $result = $query->row();

      if (!empty($result)) {
          $is_read = $result->is_read;

          if ($is_read == "0") {
              $new_is_read = "1";
          } else {
              $new_is_read = "0";
          }

          $update = array('is_read' => $new_is_read);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('student_complaints'), $update)) {
              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
    }



     public function status() {

      $id  = $this->input->post('id');

      $this->db->select('*');
      $this->db->from(tablename('student_complaints'));
      $this->db->where('id', $id);
      
      $query = $this->db->get();
      $result = $query->row();

      if (!empty($result)) {
          $is_active = $result->is_active;

          if ($is_active == "0") {
              $new_is_active = "1";
          } else {
              $new_is_active = "0";
          }

          $update = array('is_active' => $new_is_active);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('student_complaints'), $update)) {
              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
    }


}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */