<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SMS controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Messages extends Admin_Controller 
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
		$this->data['phonegroup'] = $this->mgeneral->getall("tr_phonegroup");
		$this->template->build('messagess/index');		
	}
	function inbox(){
		
		$this->template->build('messagess/inbox');
		
	}
	function outbox(){
		
		$this->template->build('messagess/outbox');		
	}
	function autoreplay(){
		
		$this->template->build('messagess/autoreplay');
	}
	function autoreplay_content($id){
		$this->data['parsing'] = $this->mgeneral->getrow(array('id'=>$id),"autoreplay");
		$this->template->build('messagess/autoreplay_content');
	}
	function balas($id){
		
		
		$this->mgeneral->update(array('id'=>$id),array('Processed'=>"true"),"inbox");			
		$this->data['parsing'] = $this->mgeneral->getrow(array('ID'=>$id),"inbox");
		$this->template->build('messagess/balas');
	}
	
	/* 
	 * Load Utility Helper Function Controller
	 * 1. Load data Inbox
	 * 2. Load data outbox
	 * 3. Load data autoreplay
	 */
	 
	function load_inbox(){		
		$this->datatables->select('
			t1.ID as ID,
			t1.SenderNumber as SenderNumber,
			t1.TextDecoded as TextDecoded, 
			t1.Processed as Processed,
			t1.RecipientID as RecipientID,
			t1.ReceivingDateTime as ReceivingDateTime
		');				
		$this->datatables->from('inbox t1');		
		$this->datatables->add_column('show','', 'ID');				
		echo  $this->datatables->generate();
	}
	function load_outbox(){		
		$this->datatables->select('
			t1.ID as ID,
			t1.DestinationNumber as DestinationNumber,
			t1.SenderID as SenderID, 
			t1.TextDecoded as TextDecoded
		');				
		$this->datatables->from('outbox t1');		
		$this->datatables->add_column('show','', 'ID');				
		echo  $this->datatables->generate();
	}
	function load_autoreplay(){		
	
		$this->datatables->select('
			t1.id as id,
			t1.format as format,
			t1.content as content
			
		');				
		$this->datatables->from('autoreplay t1');		
		$this->datatables->add_column('show','', 'id');	
		echo  $this->datatables->generate();
	}
	
	function send(){
		
		$response =  array();
		$protokol =  $this->input->post('protokol');
		
		switch($protokol){
		
			case "wa":
				//this Logic WA
			break;
			
			case "email":
				//this Logic WA
			break;
			
			default:
			
				$type = $this->input->post('type');
				
				switch($type){
				
					case "single":
					
						$destination 			= $this->input->post('destination');
						$destination_explode 	= explode(",",$destination);
						
						foreach($destination_explode as $number){
							
							$data_send =  array(
								"DestinationNumber"		=> str_replace(' ','',$number),
								"TextDecoded"			=> $this->input->post('messages'),
								"SenderID"				=> $this->input->post('device')
							);
							
							$this->mgeneral->save($data_send,"outbox");
						
						}
						$response['code'] = 01;
						$response['message'] = "Sms Send Success";
						
					break;
					
					case "group":
					
					break;
					
					case "broadcast":
						
						$phonebook =  $this->mgeneral->getall("tr_phonebook");
						
						foreach($phonebook as $number){
							
							$data_send =  array(
								"SenderID"		=> str_replace(' ','',$number->number),
								"TextDecoded"	=> $this->input->post('messages')
							);
							
							$this->mgeneral->save($data_send,"outbox");
							
						}
						$response['code'] = 01;
						$response['message'] = "Sms Send Success";
						
					break;
				}
			break;
		}
		echo json_encode($response);
	}	
	
	function autoreplay_send(){
		$result = array();
		
		$data =  array(
			"content"		=> $this->input->post('messages')			
		);
		
		$id = $this->input->post('id');			
		
		$this->mgeneral->update(array('id'=>$id),$data,"autoreplay");			
		
		$result['code'] 	= "01";
		$result['message']	= "Update Sukses";
		
		echo json_encode($result);
	}
	function balas_send(){
		$result = array();
		$data_send =  array(
			"DestinationNumber"		=> $this->input->post('number'),
			"TextDecoded"			=> $this->input->post('messages'),
			"SenderID"				=> $this->input->post('device')
		);
		$this->mgeneral->save($data_send,"outbox");
		$result['code'] 	= "01";
		$result['message']	= "Replay Sukses";
		
		echo json_encode($result);
	}
	function remove(){
		if($var = $this->input->post('data_id')){
				$this->mgeneral->delete(array('id'=>$var),"inbox");
				$result['code'] 	= "03";
				$result['message']	= "Delete Sukses";
			}else{
				$result['code'] 	= "03";
				$result['message']	= "Not Parsing";
			}
	}
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