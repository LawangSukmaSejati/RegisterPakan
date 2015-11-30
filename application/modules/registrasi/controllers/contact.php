<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Contact controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Contact extends Admin_Controller 
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
		//$this->data['phonegroup'] = $this->mgeneral->getall("tr_phonegroup");
		$this->data['phonegroup'] = array(1,2,3,4,5,6,78);
		//$this->load->view('contacts/index',$data);
		$this->template->build('contacts/index');		
	}

	function phonegroup(){
		//$this->load->model('umar');
		//$this->umar->ambildata();
		$this->data['phonegroup'] = $this->mgeneral->getall("tr_phonegroup");
		$this->template->build('contacts/phonegroup');
	}

	function addph(){

		$this->template->build('contacts/addphon');

	}

	function tambahphg(){

		$response = array();

		$data = array(
			'code'=>$this->input->post('code'),
			'name'=>$this->input->post('name')
			);

		$this->mgeneral->save($data,'tr_phonegroup');
		$response['code'] = 01;
		$response['masagess'] = 'data berhasil tersimpan.';
		echo(json_encode($response));
	}

	function editphg($param){
		$this->data['parsing'] = $this->mgeneral->getRow(array('id'=>$param),'tr_phonegroup');

		$this->template->build('contacts/editphg');

	}

	function updatephg(){

		$response = array();

		$data = array(
			'code'=>$this->input->post('code'),
			'name'=>$this->input->post('name')
			);
		$id = $this->input->post('id');
		$this->mgeneral->update(array('id'=>$id),$data,'tr_phonegroup');
		$response['code'] = 01;
		$response['masagess'] = 'data berhasil diubah.';
		echo(json_encode($response));
	}

	function deletephg($id){
		
		$result = array();

		$this->mgeneral->delete(array('id'=>$id),"tr_phonegroup");
				
				$result['code'] 	= 01;
				$result['message']	= "Delete Sukses";
				echo(json_encode($result));	
	}

	function phonebook(){

		$this->data['phonebook'] = $this->mgeneral->getall("tr_phone");
		$this->template->build('contacts/phonebook');
		
	}

	function addphbk(){

		$this->template->build('contacts/addphbk');
	}

	function tambahphbk(){
		$response = array();

		$data = array(
			'code'=>$this->input->post('code'),
			'name'=>$this->input->post('name'),
			'number'=>$this->input->post('number')
			);

		$this->mgeneral->save($data,'tr_phone');
		$response['code'] = 01;
		$response['masagess'] = 'data berhasil tersimpan.';
		echo(json_encode($response));
	}
	
	function editphbk($edt){
		$this->data['parsing'] = $this->mgeneral->getRow(array('id'=>$edt),'tr_phone');

		$this->template->build('contacts/editphbk');

	}

	function updatephbk(){

		$response = array();

		$data = array(
			'code'=>$this->input->post('code'),
			'name'=>$this->input->post('name'),
			'number'=>$this->input->post('number')
			);
		$id = $this->input->post('id');
		$this->mgeneral->update(array('id'=>$id),$data,'tr_phone');
		$response['code'] = 01;
		$response['masagess'] = 'data berhasil diubah.';
		echo(json_encode($response));
	}

	function deletephbk($id){
		
		$result = array();

		$this->mgeneral->delete(array('id'=>$id),"tr_phone");
				
				$result['code'] 	= 01;
				$result['message']	= "Delete Sukses";
				echo(json_encode($result));	
	}
	
	/* 
	 * Load Utility Helper Function Controller
	 * 1. Load data Inbox
	 * 1. Load data outbox
	 */
	 
	function load_inbox(){		
		$this->datatables->select('
			t1.id as id,
			t1.code as code, 
			t1.name as name,
			t1.descr as descr,
			t1.active as active
		');				
		$this->datatables->from('tr_unit t1');		
		$this->datatables->add_column('show','', 'id');				
		echo  $this->datatables->generate();
	}
	function load_outbox(){		
		$this->datatables->select('
			t1.id as id,
			t1.code as code, 
			t1.name as name,
			t1.descr as descr,
			t1.active as active
		');				
		$this->datatables->from('tr_unit t1');		
		$this->datatables->add_column('show','', 'id');				
		echo  $this->datatables->generate();
	}
	
	/**
	 * Add a new . 
	 */
	function add()
	{
		$data 		= $this->mgeneral->getAll("tr_unit");		
		$this->template->build('units/unit-add');	
	}
	
	/**
	 * Edit 
	 * 
	 * @param integer $id 
	 */
	function edit($id)
	{
		$this->data['parsing']	= $this->mgeneral->getRow(array('id'=>$id),"tr_unit");		
		
		$this->template->build('units/unit-edit');
		
	}
	/**
	 * View 
	 * 
	 * @param integer $id 
	 */
	
	function execute($method = '')
	{
		$result = array();
		if($method == "update")
		{
			$data =  array(
				"code"		=> $this->input->post('code'),
				"name"		=> $this->input->post('name'),
				"descr"		=> $this->input->post('descr'),
				"active"	=> $this->input->post('active')
			);
			$id = $this->input->post('id');			
			$this->mgeneral->update(array('id'=>$id),$data,"tr_unit");			
			$result['code'] 	= "01";
			$result['message']	= "Update Sukses";
		}
		else if ($method == "save")
		{
			$data =  array(
				"code"		=> $this->input->post('code'),
				"name"		=> $this->input->post('name'),
				"descr"		=> $this->input->post('descr'),
				"active"	=> $this->input->post('active')			
			);			
			$this->mgeneral->save($data,"tr_unit");
			$result['code'] 	= "02";
			$result['message']	= "Save Sukses";
		}
		else if ($method == "delete")
		{
			if($var = $this->input->post('data_id')){
				$this->mgeneral->delete(array('id'=>$var),"tr_unit");
				$result['code'] 	= "03";
				$result['message']	= "Delete Sukses";
			}else{
				$result['code'] 	= "03";
				$result['message']	= "Not Parsing";
			}
		}
		else if ($method == "active")
		{
			if($i= $this->input->post('id')){
				$data =  array(
					"active"	=> $this->input->post('active')				
				);			

				$this->mgeneral->update(array('id'=>$i),$data,"tr_unit");
				$result['code'] 	= "04";
				$result['message']	= "Active";
			}else{
				$result['code'] 	= "04";
				$result['message']	= "Not Parsing";
			}
		}
		else
		{
			$result['code'] 	= "05";
			$result['message']	= "Unmethod";
		}
		echo json_encode($result);
	}
	
}


/* End of file role.php */
/* Location: ./application/modules/acl/controllers/role.php */