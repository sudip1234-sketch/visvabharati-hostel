<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Cmsmodel extends CI_Model {

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

    
    public function load_all_data() {
        $this->db->select('cms.*');
        $this->db->from(tablename('cms')." as cms");
        $this->db->order_by("set_order", "asc");

        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }


    public function load_main_group() {
        $this->db->select('cms.id,cms.cms_title');
        $this->db->from(tablename('cms')." as cms");
        $this->db->where("parent_id", 0);
        $this->db->where("is_child", "yes");

        $query = $this->db->get();
        $result = $query->result();

        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
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
    public function status($id) {
      $this->db->select('*');
      $this->db->from(tablename('user'));
      $this->db->where('id', $id);
      $this->db->where('delete_flag', 'N');

      $query = $this->db->get();
      $result = $query->row();

      if (!empty($result)) {
          $is_active = $result->is_active;

          if ($is_active == "N") {
              $new_is_active = "Y";
          } else {
              $new_is_active = "N";
          }

          $update = array('is_active' => $new_is_active);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('user'), $update)) {
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
      $this->db->delete('cms'); 

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




        $id                              = $this->input->post('cms_id');
        $parent_category                 = $this->input->post('parent_category');
        $cms_title                       = $this->input->post('cms_title');
        $cms_slug                        = strtolower(str_replace(' ', '-', $this->input->post('cms_title')));
        $cms_content                     = $this->input->post('cms_content');
      
        if (!empty($id)) {
            $data = array(
                'parent_id'         => $parent_category,
                'cms_title'         => $cms_title,
                'cms_content'       => $cms_content


            );

            $this->db->where('id', $id)->update(tablename('cms'), $data);
            return $id;
        } else {
            $data = array(
                'parent_id'             => $parent_category,
                'cms_title'             => $cms_title,
                'cms_slug'              => $cms_slug,
                'cms_content'           => $cms_content
                 
            );
            $this->db->insert(tablename('cms'), $data);
            return $this->db->insert_id();
        }
    }

}
/* End of file Usermodel.php */
/* Location: ./application/modules/user/models/admin/Usermodel.php */