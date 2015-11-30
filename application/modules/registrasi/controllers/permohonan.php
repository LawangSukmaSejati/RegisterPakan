<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SMS controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Permohonan extends Admin_Controller 
{
	/**
	 * Constructor
	 */
    protected $_uid;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tree');
        $this->_uid = $this->auth->userid();
	}	
	public function index()
	{
       /* $sql = $this->db->query("select act.id as idx,act.username,fm1.nomor_pemohon,fm1.tanggal_pemohon,fm1.nama_perusahaan,fm1.nama_penanggung_jawab_perusahaan from actors act,actors_form1 fm1 where act.id= fm1.actors_id")->result();
        */
        $id = $this->auth->userid();
        $identity = $this->mgeneral->getWhere(array('users_id'=>$id),'p_form_identity');
        
        $this->data['permohonan'] = $identity;
		$this->template->build('permohonans/index');		
	}
	
    public function identity()
	{
		
        $id = $this->auth->userid();        
        $this->data['users_id'] = $id;
        $this->data['random_digit'] = "KKP".date('Ymd').random_digit(4);
        $this->template->build('permohonans/form_identity_insert');		
        
	}
    public function identity_edit($id= null)
    {
        
        $id = $this->auth->userid();
        $data = $this->mgeneral->getRow(array('users_id'=>$id),'p_form_identity');        
        $this->data['loops'] = $data;
        $this->data['users_id'] = $id;
        $this->template->build('permohonans/form_identity_update');      

    }
    /*
     * Start Form A
     */
    public function form_a($idx = null)
	{
		
        $this->data['identity'] = $this->mgeneral->getrow(array('id'=>$idx),'p_form_identity');
        
        $this->data['form_a'] = $this->mgeneral->getWhere(array('users_id'=>$this->_uid,'p_form_identity'=>$idx),'p_form_a');
        $this->template->build('permohonans/form_a');		
        
	}
    public function form_a_form($id_identity = null,$idx = null)
    {
        
        $form_a = $this->mgeneral->getRow(array('id'=>$idx),'p_form_a');
        $identity = $this->mgeneral->getRow(array('users_id'=>$this->_uid,'id'=>$id_identity),'p_form_identity');
        
        $this->data['users_id'] = $this->_uid;
        $this->data['identity'] = $identity;
        $this->data['form_a']   = $form_a;
        $this->template->build('permohonans/form_a_add');        
    }
    public function form_a_form_detail($idx = '')
    {
        
        $row = $this->mgeneral->getRow(array('id'=>$idx),'p_form_a');
        $identity = $this->mgeneral->getRow(array('users_id'=>$this->_uid),'p_form_identity');
        $this->data['form_a'] = $this->mgeneral->getWhere(array('users_id'=>$this->_uid),'p_form_a');
        $this->data['users_id'] = $this->_uid;
        $this->data['identity'] = $identity;
        $this->template->build('permohonans/form_a_add');        
    }
     /*
     * End Of Form A
     */
    
	/*
     * Start Of Form B
     */
	public function form_b($idx =  null,$form_a = null){
        
        $this->data['identity'] = $this->mgeneral->getrow(array('id'=>$idx),'p_form_identity');
        
        $this->data['form_a']   = $this->mgeneral->getrow(array('id'=>$form_a),'p_form_a');
        
        //$this->data['form_identity'] = $this->mgeneral->getWhere(array('users_id'=>$this->_uid,'p_form_identity'=>$idx),'p_form_a');
        $this->data['p_form_b_bahan_baku'] = $this->mgeneral->getWhere(array('users_id'=>$this->_uid,'p_form_identity'=>$idx,'p_form_a'=>$form_a),'p_form_b_bahan_baku');
        $this->data['p_form_b_bahan_pelengkap'] = $this->mgeneral->getWhere(array('users_id'=>$this->_uid,'p_form_identity'=>$idx,'p_form_a'=>$form_a),'p_form_b_bahan_pelengkap');
        
        $this->template->build('permohonans/form_b');       
    }
    public function form_b_form($idx =  null,$form_a = null,$flag){
        $this->data['users_id'] = $this->_uid;
        $this->data['identity'] = $this->mgeneral->getrow(array('id'=>$idx),'p_form_identity');
        $this->data['form_a']   = $this->mgeneral->getrow(array('id'=>$form_a),'p_form_a');
        switch ($flag) {
            case 'bb':
                
                $this->template->build('permohonans/form_b_add_bb');       
                break;
            case 'bp':
                
                $this->template->build('permohonans/form_b_add_bp');       
                break;
            default:
                redirect('permohonan/form_b/'.$idx.'/'.$form_a);
                break;
        }
    
    }
    /*
     * Start Of Form c
     */
	public function form_c($idx = null)
    {
        $this->data['users_id'] = $this->_uid;
        $this->data['identity'] = $this->mgeneral->getrow(array('id'=>$idx),'p_form_identity');
        
        $this->data['form_c'] = $this->mgeneral->getRow(array('users_id'=>$this->_uid,'p_form_identity'=>$idx),'p_form_c');
        $this->template->build('permohonans/form_c');       
        
    }
}


/* End of file role.php */
/* Location: ./application/modules/acl/controllers/role.php */