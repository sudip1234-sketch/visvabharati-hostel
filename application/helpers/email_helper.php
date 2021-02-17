<?php
function send_email($to, $subject, $data) {
    $config['protocol'] = 'mail';
    $config['smtp_host'] = "mail.visvabharati-hostel.com";
    $config['smtp_crypto'] = 'tls';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'info@visvabharati-hostel.com';
    $config['smtp_pass'] = 'f(6ZoaJ2C~E3';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

    $CI = & get_instance();
    $CI->load->library('email');
    $CI->email->initialize($config);
    $CI->email->from('info@visvabharati-hostel.com', 'Visvabharati');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($data['body']);
    $CI->email->send();


   // echo $CI->email->print_debugger('--------------------'); die;
}