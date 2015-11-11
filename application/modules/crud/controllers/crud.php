<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CRUD controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Crud extends Admin_Controller 
{
	/**
	 * Constructor
	 */
	
    function __construct()
    {
    
		parent::__construct();
        $this->load->helper('tree');
	}	
	
	public function index(){
		echo "good dady";
	}
	
	
	
	
	public function add(){
		$this->template->build('cruds/add');
	}
	
	public function edit(){
		$load = $this->mgeneral->getRow(array('id'=>3),"crud");
		$this->data['rows'] =$load;
		$this->template->build('cruds/edit');
	}
	
	public function execute($flag,$db_name){
		
		$result 	= array();
		$db_name 	= base64_decode($db_name);
		$post_put 	= array();
		
		switch($flag){
			case 0: //Save
				
				$this->mgeneral->save($post_put,$db_name);
				$result['uid'] 		= uniqid();
				$result['code'] 	= 1;
				$result['message'] 	= "Save Success";
			break;
			case 1: //Update
				$this->mgeneral->update($where,$post_put,$db_name);
				$result['uid'] 		= uniqid();
				$result['code'] 	= 1;
				$result['message'] 	= "Update Success";
			break;
			case 2: //Delete
				$this->mgeneral->delete($where,$post_put,$db_name);
				$result['uid'] 		= uniqid();
				$result['code'] 	= 1;
				$result['message'] 	= "Update Success";
			break;
			default:
			break;
		}
		
		
	}
	
	
	
}


/* End of file role.php */
/* Location: ./application/modules/Crud/controllers/crud.php */