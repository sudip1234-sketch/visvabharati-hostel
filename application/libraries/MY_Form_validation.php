<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    function error_array() {
        return $this->_error_array;
    }

    public function is_unique($str, $field) {
        $field_ar = explode('.', $field);
        $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $str), 1, 0);
        if ($query->num_rows() === 0) {
            return TRUE;
        }

        return FALSE;
    }

    public function is_unique_update($str, $field) {
        $field_ar = explode('.', $field);
        $bom_number = $this->CI->input->post('entry_number');
        if ($bom_number) {
            $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $str, 'bill_id !=' => $bom_number), 1, 0);
        } else {
            $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $str), 1, 0);
        }
       
        if ($query->num_rows() === 0) {
            return TRUE;
        } else {
            $CI =& get_instance();
            $CI->form_validation->set_message($field_ar[1], "Sorry, that  is already being used.");
            return FALSE;
        }
    }

}

?>