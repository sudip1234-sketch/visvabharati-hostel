<?php
/**
 * User Model Class. Handles all the datatypes and methodes required for handling User
 */
class Settingsmodel extends CI_Model {

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
        $this->db->from(tablename('settings')." as st");
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
     * Used for modify of settings 
     *
     * <p>Description</p>
     *
     * <p>This function updates settings values [Table: vb_settings]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

    public function modify($id = '') {

        $id                              = '1';
        $email_id                        = $this->input->post('email_id');
        $fax                             = $this->input->post('fax');
        $address                         = $this->input->post('address');
        $phone                           = $this->input->post('phone');
        $quote_context                   = $this->input->post('quote_context');
        $hostel_rules_and_regulations    = $this->input->post('hostel_rules_and_regulations');

        $exist_image                     = $this->input->post('exist_image');
        $exist_quote_image               = $this->input->post('exist_quote_image');


        $uploadPath   =  $_SERVER['DOCUMENT_ROOT'].'/assets/image/';
        $allowedTypes = 'gif|jpg|jpeg|png|bmp'; 

        if(!empty($_FILES['image']['name']))
        {
            
            $this->load->library('upload');
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = $allowedTypes;
            $config['file_name'] = time();
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
            $image_name = $exist_image;
        }


        $uploadPath1   =  $_SERVER['DOCUMENT_ROOT'].'/assets/image/';
        $allowedTypes1 = 'gif|jpg|jpeg|png|bmp'; 



        if(!empty($_FILES['quote_image']['name']))
        {
            
            $this->load->library('upload');
            $config1['upload_path'] = $uploadPath1;
            $config1['allowed_types'] = $allowedTypes1;
            $config1['file_name'] = time();
            $this->upload->initialize($config1);


            if($_FILES['quote_image']['error']==0)
            {
                $picName1=$_FILES['quote_image']['name']; 
                $ext1 = end((explode(".", $_FILES['quote_image']['name']))); 
            
                 // generate a unique file name
                $rand1 = md5(uniqid($picName1, true));
              
                $newPicName1=$rand1.'.'.$ext1;
              
                $destination1=$uploadPath1.$newPicName1; 

                if (move_uploaded_file($_FILES['quote_image']['tmp_name'] ,$destination1))
                {
                    
                    $image_name1 = $newPicName1;
                }
            }

        }
        else
        {
            $image_name1 = $exist_quote_image;
        }


      
        if (!empty($id)) {
            $data = array(
               
                'email_id'          => $email_id,
                'fax'               => $fax,
                'address'           => $address,
                'phone'             => $phone,
                'image'             => $image_name,
                'quote_image'       => $image_name1,
                'quote_context'     => $quote_context,
                'hostel_rules_and_regulations' => $hostel_rules_and_regulations
            );

            $this->db->where('id', $id)->update(tablename('settings'), $data);
            return $id;
        } else {
            $data = array(
               'email_id'          => $email_id,
               'fax'               => $fax,
               'address'           => $address,
               'phone'             => $phone,
               'image'             => $image_name,
               'quote_image'       => $image_name1,
               'quote_context'     => $quote_context,
               'hostel_rules_and_regulations' => $hostel_rules_and_regulations 
            );

            $this->db->insert(tablename('settings'), $data);
            return $this->db->insert_id();
        }
    }

}
/* End of file Settingsmodel.php */
/* Location: ./application/modules/settings/models/admin/Settingsmodel.php */