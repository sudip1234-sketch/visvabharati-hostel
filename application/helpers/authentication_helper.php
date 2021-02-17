<?php

function admin_authenticate() {
  $CI = & get_instance();
  $admin_uid = $CI->session->userdata('admin_uid');

  if(empty($admin_uid)) {
    $CI->session->set_flashdata('errormessage', 'Invalid Access in Admin Panel');
    $redirect = base_url('admin');
    redirect($redirect);
  }
}


function admin_not_authenticate() {
  $CI = & get_instance();  
  if ($CI->session->userdata('admin_uid') != null) {
        $CI->session->set_userdata('errormessage', 'Invalid Access');
        $redirect = base_url('admin-allotment-list');
        redirect($redirect);
    } else {
        return true;
    }
}

function frontend_authenticate() {
    $CI = & get_instance();
    if ($CI->session->userdata('front') == null) {
        $CI->session->set_userdata('errormessage', 'Invalid Access');
        $redirect = base_url('');
        redirect($redirect);
    } else {
        return true;
    }
}


function frontend_not_authenticate() {
    $CI = & get_instance();

    if ($CI->session->userdata('front') != null) {
        $CI->session->set_userdata('errormessage', 'Invalid Access');
        $redirect = base_url('');
        redirect($redirect);
    } else {
        return true;
    }
}

function backend_user_type() {
    $CI = & get_instance();
    $details = [];
    if ($CI->session->userdata('admin') != null) {
        return $CI->session->userdata('admin')->type;
    } else {
        return false;
    }
}

function backend_user_role() {
    $CI = & get_instance();
    $details = [];
    if ($CI->session->userdata('admin') != null) {
        return $CI->session->userdata('admin')->role;
    } else {
        return false;
    }
}

/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */