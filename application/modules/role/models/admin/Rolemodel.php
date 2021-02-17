<?php
/**
 * Sub-admin Model Class. Handles all the datatypes and methodes required for handling Sub-admin
 */
class Rolemodel extends CI_Model {

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
     * Used for loading functionality of Sub-admin for an admin
     *
     * <p>Description</p>
     *
     * <p>This function loads all the Sub-admin that has been added by current admin [Table: vb_admin]</p>
     *
     * @access  public
     * @param none
     * @return  array
     */
    public function load_all_data() {
        $this->db->select('ad.*');
        $this->db->from(tablename('admin')." as ad");
        $this->db->where("is_subadmin", "Y");
        $this->db->where("delete_flag", "N");
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
     * Used for change status functionality of Sub-admin for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, check the current Sub-admin status
     * and change it the the opposite [Table: vb_admin]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
    public function status($id) {

      //$id  = $this->input->post('id');

      $this->db->select('*');
      $this->db->from(tablename('admin'));
      $this->db->where('id', $id);
      
      $query = $this->db->get();
      $result = $query->row();

      if (!empty($result)) {
          $is_active = $result->status;

          if ($is_active == "0") {
              $new_is_active = "1";
          } else {
              $new_is_active = "0";
          }

          $update = array('status' => $new_is_active);
          $this->db->where('id', $id);

          if ($this->db->update(tablename('admin'), $update)) {
              return 1;
          } else {
              return;
          }
      } else {
          return;
      }
    }

    /**
     * Used for delete functionality of Sub-admin for an admin
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: vb_admin]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */
      public function delete() {
      $id  = $this->input->post('del_ad_id');
      // $this->db->where('id', $id);
      // $this->db->delete('admin'); 
      // return true;      

      $update = array('delete_flag' => 'Y');
      $this->db->where('id', $id);
      if ($this->db->update(tablename('admin'), $update)) {
          return 1;
      } else {
          return;
      }
      
    }

      /**
     * Used for modify of Sub-admin 
     *
     * <p>Description</p>
     *
     * <p>This function takes id as input, and deletes it [Table: vb_admin]</p>
     *
     * @access  public
     * @param none
     * @return  int
     */

     public function modify($id = '') {

        //echo "<pre>"; print_r($_POST); die;

        $id                              = $this->input->post('ad_id');
        $name                            = $this->input->post('name');
        $designation                     = $this->input->post('designation');
        $email                           = $this->input->post('email');
        $phone                           = $this->input->post('phone');
        $fax                             = $this->input->post('fax'); 
        $admin_image_exist               = $this->input->post('admin_image_exist');
        $role = $this->input->post('role'); 

        $is_subadmin = $this->input->post('is_subadmin');
      
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, 8 );

        $file = $_FILES['image'];
        if (isset($file['name']) && $file['name'] != '') {
            $imagename = $file['name'];
            $imagearr = explode('.', $imagename);
            $ext = end($imagearr);
            $newimage = time() . rand() . "." . $ext;
            
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file['tmp_name'];
            $config['new_image'] = "assets/front/upload/administration/" . $newimage;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = '';
            $config['height'] = '';
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $image_name = $newimage;
            
        }else {
            $image_name = $admin_image_exist;
        }

        //echo $image_name; die;


        if (!empty($id)) {
            $data = array(
                'name'              => $name,
                'designation'       => $designation,
                //'emailid'             => $email,
                'phoneno'             => $phone,
                'image'             => $image_name,
                //'fax'               => $fax,  
                'is_subadmin'       => $is_subadmin
                 //'role'=> implode('##', $role)
            );

            $this->db->where('id', $id)->update(tablename('admin'), $data);
            return $id;
        } else {
            $dataSave = array(
                'name'              => $name,
                'designation'       => $designation,
                'emailid'           => $email,
                'phoneno'           => $phone,
                'image'             => $image_name,
                //'fax'               => $fax,
                'password'          => md5($password),
                'is_subadmin'       => $is_subadmin              
                //'role'=> implode('##', $role)
                 
            );
            //echo "<pre>"; print_r($dataSave);
            $this->db->insert(tablename('admin'), $dataSave);

            //Start send sms

            $contact_no = $phone;
            $sms_content=ucwords($name).', Thank you for your registration. Visit www.visvabharati-hostel.com/admin and log-in with  USERNAME :'.$email.' Password: '.$password;
            $timeout = 0;

            $ch = curl_init();
            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, "http://103.16.101.52:8080/sendsms/bulksms?username=swbs-viswa&password=viswa123&type=0&dlr=1&destination=91".$contact_no."&source=VBHSTL&message=".urlencode($sms_content));

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
            $file_contents = curl_exec ( $ch );


            if (curl_errno ( $ch )) {
                echo curl_error ( $ch );
                curl_close ( $ch );
                exit ();
            }
            curl_close ( $ch );
            //End Sms
            
            // mail password

                $message            = '<html><body>
<table cellspacing="0" cellpadding="0" style="width: 700px; margin: 0 auto; border: 0;">
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 15px; background: #000;">
            <a href="#">
                <img src="<?php echo base_url().\'/assets/front/images/Visva_bharati_logo.jpg\'; ?>" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 25px 25px 0px 25px; background: #1a1819; color: #fff; font-family: sans-serif; font-size: 20px;">
            
        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 0 15px; font-family: sans-serif; font-size: 16px; color: #000; background: #eaeaea;">

            <table cellspacing="0" cellpadding="0" style="width: 600px; margin: 0 auto; border: 0; background: #fff;">
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Hello <i style="font-weight: 300; color: #444;">'.@$name.'</i>,
                    </td>
                </tr>

                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Email : '.$email.'
                    </td>
                </tr>                
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Password : '.$password.'
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 15px 25px;">
                        Regards,<br>
                        <i style="font-weight: 300; color: #444;">Visvabharati</i>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align: middle; padding: 0px 25px 25px 25px; background: #1a1819; color: #fff; font-family: sans-serif; font-size: 20px;">
            <table cellspacing="0" cellpadding="0" style="width: 600px; margin: 0 auto; border: 0; background: #fff;">
                <tr>
                    <td style="text-align: left; vertical-align: middle; padding: 5px;">
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table></body></html>

                    ';

                   // echo $message; die("----------------");

           $data['body']=$message;
            send_email($email,"Your Login Credentials to login to Visvabharati",$data);
            return $this->db->insert_id();
        }
    }

    function isunique($where) 
    {
      
        $c = $this->db->where($where)->count_all_results(tablename('admin'));
        return $c === 0 ? TRUE : FALSE;
    }
}
/* End of file Rolemodel.php */
/* Location: ./application/modules/role/models/admin/Rolemodel.php */