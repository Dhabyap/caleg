<?php

class load extends CI_Controller {
	 
    function __construct() {
        parent::__construct();
        $this->load->library('datatables');
    }
	
    function data_users() {
        $this->datatables->select('*');
        $this->datatables->from('tbl_user');
        echo $this->datatables->generate();
        exit;
    }
	
}

/* End of file load.php */
/* Location: ./application/controller/load.php */