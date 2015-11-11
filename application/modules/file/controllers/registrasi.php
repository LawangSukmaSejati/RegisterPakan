<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Menu controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Registrasi extends Admin_Controller 
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
		
		//$this->template->build('menu/menu-index');
		/*Load Parsing*/
		$js = $this->load->file('assets/beckend/my_js/my_tables.js',true);		
		$this->template
			->set_title("Registrasi")			
			->set_js_script($js,'',true)
			->build('registrasi/menu-index');
	}
	function load(){		
		$this->datatables->select('
			t1.id as id,
			t1.nama as nama, 
			t1.otmilti as otmilti,
			t1.otmil as otmil,
			t1.telepon as telepon,
			t1.alamat as alamat,
			
		');				
		$this->datatables->from('tkonfigurasi t1');
		//$this->datatables->join('tr_menu t2','t2.id = t1.parent_id','left');
		//$this->datatables->join('acl_resources t3','t3.id = t1.resource_id','left');
		$this->datatables->add_column('show','', 'id');				
		echo  $this->datatables->generate();
	}
	
	/**
	 * Add a new . 
	 */
	function add()
	{
		$data 		= $this->mgeneral->getAll("tr_menu");		
		$resource 	= $this->db->query("select id,name,parent as parent_id from acl_resources ")->result();		
		$this->data['menu_parent']  = buildTree($data);
		$this->data['link'] 		= buildTree($resource);
		$this->data['lookuptopmilti'] 	= $this->mgeneral->getall("totmilti");
		$this->template->build('registrasi/menu-add');	
	}
	function lookup(){
		$idx = $this->input->post('idx');
		$data 		= $this->db->query("SELECT * FROM totmil WHERE kode_otmilti ='".$idx."' ORDER BY 'nama'")->result();		
		echo "
		<script>
			$('#otmil').select2({
				allowClear: !0
			});
		</script>
		<select class='col-md-12 full-width-fix' name='otmil' id='otmil' >";
								
		foreach($data as $row){
			echo "<option value='".$row->kode_otmil."'>".$row->nama."</option>";
		}
		echo "</select>";
	}
	/**
	 * Edit 
	 * 
	 * @param integer $id 
	 */
	function edit($id)
	{
		$this->data['parsing']	= $this->mgeneral->getRow(array('id'=>$id),"tr_menu");		
		$data 		= $this->mgeneral->getAll("tr_menu");		
		$resource 	= $this->db->query("select id,name,parent as parent_id from acl_resources ")->result();		
		
		$this->data['link'] 		= buildTree($resource);
		$this->data['menu_parent'] = buildTree($data);
		$this->template->build('menu/menu-edit');
		
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
				"label"		=> $this->input->post('label'),
				"resource_id"=> $this->input->post('link'),
				"active"	=> $this->input->post('active'),
				"parent_id"	=> $this->input->post('parent'),
				"icon"		=> $this->input->post('icon')
				
			);
			$id = $this->input->post('id');			
			$this->mgeneral->update(array('id'=>$id),$data,"tr_menu");			
			$result['code'] 	= "01";
			$result['message']	= "Update Sukses";
		}
		else if ($method == "save")
		{
			$data =  array(
				"code"		=> $this->input->post('code'),
				"name"		=> $this->input->post('name'),
				"descr"		=> $this->input->post('descr'),
				"label"		=> $this->input->post('label'),
				"resource_id"=> $this->input->post('link'),
				"active"	=> $this->input->post('active'),
				"parent_id"	=> $this->input->post('parent'),
				"icon"		=> $this->input->post('icon')				
			);			
			$this->mgeneral->save($data,"tr_menu");
			$result['code'] 	= "02";
			$result['message']	= "Save Sukses";
		}
		else if ($method == "delete")
		{
			if($var = $this->input->post('data_id')){
				$this->mgeneral->delete(array('id'=>$var),"tr_menu");
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

				$this->mgeneral->update(array('id'=>$i),$data,"tr_menu");
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