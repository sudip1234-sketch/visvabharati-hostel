<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Hostelmodel extends CI_Model {

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


        $hostel_type            = $this->input->get('hostel_type');

        $this->db->select('ad.*');
        $this->db->from(tablename('hostel')." as ad");

        if(!empty($hostel_type))
        {
            $this->db->where('hostel_type',$hostel_type);
        }

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
    public function status() {

      $id  = $this->input->post('id');

      $this->db->select('*');
      $this->db->from(tablename('hostel'));
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

          if ($this->db->update(tablename('hostel'), $update)) {
              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
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
      $this->db->delete('hostel'); 

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
        //echo "<pre>"; print_r($_FILES); die;

        $id                           = $this->input->post('ad_id');
        $hostel_name                  = $this->input->post('hostel_name');
        $hostel_code                  = $this->input->post('hostel_code');
        $hostel_description           = $this->input->post('hostel_description');
        $hostel_type                  = $this->input->post('hostel_type');
        $kitchen                      = $this->input->post('kitchen');

        $warden = array();
        $warden = $this->input->post('warden');

        $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/hostel_pics/';
        $image_name = array();
       
        for($i=0;$i<count($_FILES['hostel_pics']['name']);$i++)
        {
            if(!empty($_FILES['hostel_pics']['name'][$i]))
            {
                $this->load->library('upload');
                $config['upload_path'] =  $uploadPath;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|bmp'; 
                $config['file_name'] = time();
                $this->upload->initialize($config);

                if($_FILES['hostel_pics']['error'][$i]==0)
                {
                    
                    $picName=$_FILES['hostel_pics']['name'][$i]; 
                    $ext    = end((explode(".", $_FILES['hostel_pics']['name'][$i]))); 
                    $rand   = md5(uniqid($picName, true));
                    $newPicName =$rand.'.'.$ext;
                    $destination=$uploadPath.$newPicName;

                    if (move_uploaded_file($_FILES['hostel_pics']['tmp_name'][$i] ,$destination))
                    {
                        $image_name[$i] = $newPicName;
                    }

                }
            }
        }

        $image_name = !empty($image_name) ? implode(",",$image_name) : '';

        /*if(!empty($_FILES['hostel_pics']['name']))
        {

            $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/student_pics/';
            $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 
            
            $this->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
            $this->upload->initialize($config);


            if($_FILES['profile_image']['error']==0)
            {
                $picName=$_FILES['profile_image']['name']; 
                $ext = end((explode(".", $_FILES['profile_image']['name']))); 
            
                 // generate a unique file name
                $rand = md5(uniqid($picName, true));
              
                $newPicName=$rand.'.'.$ext;
              
                $destination=$uploadPath.$newPicName; 

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'] ,$destination))
                {
                    
                    $image_name = $newPicName;
                }
            }

        }
        */


        if (!empty($id)) {

            $data_image = $this->Hostelmodel->get_row_data('hostel', ['id' => $id]);
            if($data_image->hostel_pics!='' && $image_name==''){
                $hostel_pics = $data_image->hostel_pics;
            }else if($data_image->hostel_pics=='' && $image_name !=''){
                $hostel_pics =$image_name;                
            }

            $data = array(
                'hostel_name'              => $hostel_name,
                'hostel_code'              => $hostel_code,
                'hostel_description'       => $hostel_description,
                'hostel_type'              => $hostel_type,
                'hostel_pics'              => $hostel_pics,
                'warden'                   => implode(',', $warden),
                'kitchen'                  => $kitchen
              
            );

            $this->db->where('id', $id)->update(tablename('hostel'), $data);
            return $id;
        } else {
            $data = array(
               'hostel_name'              => $hostel_name,
               'hostel_code'              => $hostel_code,
               'hostel_pics'              => $image_name,
               'hostel_description'       => $hostel_description,
               'hostel_type'              => $hostel_type,
               'warden'                   => implode(',', $warden),
               'kitchen'                  => $kitchen
                 
            );

            $this->db->insert(tablename('hostel'), $data);
            //echo $this->db->last_query(); exit;
            return $this->db->insert_id();
        }
    }

     function isunique($where) 
    {
      
        $c = $this->db->where($where)->count_all_results(tablename('hostel'));
        return $c === 0 ? TRUE : FALSE;
    }

    public function getHostelDetails($hostel_id){
        $this->db->select('st.student_id,st.full_name,st.hostel_code,st.block_no,st.floor_no,st.room_no,st.bed_no,dept.department_name,course.course_name,inst.institute_name,H.hostel_name');
        $this->db->from(tablename('student')." as st");
        $this->db->join(tablename('institute')." as inst","inst.id = st.institute_id");
        $this->db->join(tablename('department')." as dept","dept.id = st.department_id");
        $this->db->join(tablename('course')." as course","course.id = st.course_id");
        $this->db->join(tablename('hostel')." as H","H.id = st.hostel_name");
        $this->db->where('st.hostel_name', $hostel_id);
        $query = $this->db->get();
        // echo $this->db->last_query(); exit;
        return $query->result();
    }

}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */