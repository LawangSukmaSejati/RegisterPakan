<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SMS controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Smsgateway extends Admin_Controller 
{
	/**
	 * Constructor
	 */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('tree');
	}	
	function index()
	{
		
	}
	
	
}


/* End of file role.php */
/* Location: ./application/modules/acl/controllers/role.php */