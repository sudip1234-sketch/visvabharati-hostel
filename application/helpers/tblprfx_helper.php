<?php

function tablename($tablename) {
    $CI = & get_instance();
    $CI->load->database();
    return $CI->db->dbprefix($tablename);
}

/* End of file tblprfx_helper.php */
/* Location: ./application/helpers/tblprfx_helper.php */
