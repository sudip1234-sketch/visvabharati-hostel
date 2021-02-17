<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Noticemodel extends CI_Model {

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
        $this->db->select('nt.*');
        $this->db->from(tablename('notice')." as nt");
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
      $this->db->from(tablename('notice'));
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

          if ($this->db->update(tablename('notice'), $update)) {
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
      $this->db->delete('notice'); 

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

        $id                              = $this->input->post('notice_id');
        $notice_heading                  = $this->input->post('notice_heading');
        $notice_content                  = $this->input->post('notice_content');


        $uploadPath =  $_SERVER['DOCUMENT_ROOT'].'/assets/notice_attachments/';
        $image_name = array();
       
        for($i=0;$i<count($_FILES['notice_attachments']['name']);$i++)
        {
            if(!empty($_FILES['notice_attachments']['name'][$i]))
            {
                $this->load->library('upload');
                $config['upload_path'] =  $uploadPath;
                //$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp'; 
                $config['allowed_types'] = 'pdf'; 
                $config['file_name'] = time();
                $this->upload->initialize($config);

                if($_FILES['notice_attachments']['error'][$i]==0)
                {
                    
                    $picName=$_FILES['notice_attachments']['name'][$i]; 
                    $ext    = end((explode(".", $_FILES['notice_attachments']['name'][$i]))); 
                    $rand   = md5(uniqid($picName, true));
                    $newPicName =$rand.'.'.$ext;
                    $destination=$uploadPath.$newPicName;

                    if (move_uploaded_file($_FILES['notice_attachments']['tmp_name'][$i] ,$destination))
                    {
                        $image_name[$i] = $newPicName;
                    }

                }
            }
        }

        $image_name = !empty($image_name) ? implode(",",$image_name) : '';
            
        if (!empty($id)) {


                $data_image = $this->Noticemodel->get_row_data('notice', ['id' => $id]);
                $notice_attachments = '';
                if($data_image->notice_attachment!='' && $image_name==''){
                    
                    $notice_attachments = $data_image->notice_attachment;
                }else if($data_image->notice_attachment=='' && $image_name !=''){
                  
                    $notice_attachments =$image_name;                
                }else if($data_image->notice_attachment!='' && $image_name !=''){
                     
                    $notice_attachments =$image_name.','.$data_image->notice_attachment;                
                }

            $data = array(
                'notice_heading'         => $notice_heading,
                'notice_content'         => $notice_content,
                'notice_attachment'      => $notice_attachments

            );

            $this->db->where('id', $id)->update(tablename('notice'), $data);
            return $id;
        } else {
            $data = array(
                'notice_heading'         => $notice_heading,
                'notice_content'         => $notice_content,
                'notice_attachment'      => $image_name,
                'notice_date'            => date("Y-m-d H:i:s")
                 
            );
            $this->db->insert(tablename('notice'), $data);
            return $this->db->insert_id();
        }
    }

}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */