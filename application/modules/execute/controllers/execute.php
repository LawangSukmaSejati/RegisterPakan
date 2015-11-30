<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Execute controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Execute extends My_Controller 
{
	/**
	 * Constructor
	 */
	
	protected $result 	= array();
	
    function __construct()
    {
		parent::__construct();
	}	
	
	public function save($db_name){
		
		$post_put 	= array();
		
		foreach($_POST as $key=>$value){
			$post_put[$key] =$value;
		}
		
		$id = $this->mgeneral->save($post_put,$db_name);
		
		$this->result['uid'] 	 = uniqid();
		$this->result['code'] 	 = 0;
		$this->result['message'] = "Save Success";
		$this->result['idx']     = $id;
		echo json_encode($this->result);
	}
	
	public function update($db_name,$field,$idx){
		$post_put 	= array();
		
		foreach($_POST as $key=>$value){
			$post_put[$key] =$value;
		}
		$where = array($field =>$idx);
		$this->mgeneral->update($where,$post_put,$db_name);
	
		$this->result['uid'] 	 = uniqid();
		$this->result['code'] 	 = 0;
		$this->result['message'] = "Update Success";
		echo json_encode($this->result);
	}
	
	public function delete($db_name,$field,$idx){
		$where = array($field =>$idx);
		
		$this->mgeneral->delete($where,$db_name);
		
		$this->result['uid'] 	 = uniqid();
		$this->result['code'] 	 = 0;
		$this->result['message'] = "Delete Success";
		echo json_encode($this->result);
	}
	
	
}


/* End of file role.php */
/* Location: ./application/modules/Crud/controllers/crud.php */