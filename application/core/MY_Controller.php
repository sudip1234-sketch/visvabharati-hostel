<?php
/**
 * No direct access
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Controller Class. Handles all the Layout management for Front section of Visvabharati
 */
class MY_Controller extends CI_Controller {

    var $template = array();
    var $data = array();

    /**
     * The admin layout loader method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the layouts as defined
     */
    public function admin_layout() {
        
        $this->template['header'] = $this->load->view('Layouts/admin/header', $this->data, true);
        $this->template['sidebar'] = $this->load->view('Layouts/admin/sidebar', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('Layouts/admin/footer', $this->data, true);
        $this->load->view('Layouts/admin/index', $this->template);
    }

    /**
     * The front layout loader method of this class.
     *
     * @access  public
     * @param   none
     * @return  Loads all the layouts as defined
     */
    public function layout() {
        $this->template['header'] = $this->load->view('Layouts/front/header', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('Layouts/front/footer', $this->data, true);
        $this->load->view('Layouts/front/index', $this->template);
    }
}
