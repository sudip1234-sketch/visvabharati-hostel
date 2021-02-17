<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layouts{


private $ci;
   
 private $title = NULL;

 private $metadesc = NULL;
   
 public function __construct() 
 {
   $this->ci =& get_instance();
 }


public function render($view_name, $params = array(), $layout = 'landing')
 { 
     
   $view_content = $this->ci->load->view($view_name, $params, TRUE);
 
   $this->ci->load->view('Layouts/dashboard/' . $layout, array(
     'content' => $view_content,
     'title' => $this->title,
     'metadesc' => $this->metadesc,
   ));
 }


}

?>