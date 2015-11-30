<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SMS controller
 * 
 * @package App
 * @category Controller
 * @author Jeff
 */
class Dokumen extends Admin_Controller 
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
        
        $identity = $this->mgeneral->getWhere(array('users_id'=>$this->_uid),'p_form_identity');
        $this->data['permohonan'] = $identity;
        $this->template->build('dokumens/index');        

    }
    public function cheklist($idx = null)
	{
        
        $identity       = $this->mgeneral->getRow(array('users_id'=>$this->_uid),'p_form_identity');
        $form_a         = $this->mgeneral->getRow(array('p_form_identity'=>$idx),'p_form_a');
        $form_b_a       = $this->mgeneral->getRow(array('p_form_a'=>$form_a->id),'p_form_b_bahan_baku');
        $form_b_b       = $this->mgeneral->getRow(array('p_form_a'=>$form_a->id),'p_form_b_bahan_pelengkap');
        $form_c         = $this->mgeneral->getRow(array('p_form_identity'=>$idx),'p_form_c');

        $berkas_fc_pj   = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'fotocopy_penaggung_jawab'),'p_berkas_upload');
        $berkas_skdp    = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'Surat_Keterangan_Domisili_Perusahaan'),'p_berkas_upload');
        $berkas_fapp    = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'Fotocopy_Akte_Pendirian_Perusahaan'),'p_berkas_upload');
        $berkas_siu     = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'Fotocopy_Surat_Izin_Usaha'),'p_berkas_upload');
        $berkas_siup    = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'Fotocopy_Surat_Izin_Usaha_Perdagangan'),'p_berkas_upload');
        $berkas_npwp    = $this->mgeneral->getRow(array('p_form_identity'=>$idx,'flag'=>'Fotocopy_Nomor_Pokok_Wajib_Pajak'),'p_berkas_upload');
        
        $this->data['identity']        = $identity;
        $this->data['form_a']          = $form_a;
        $this->data['form_b_a']        = $form_b_a;
        $this->data['form_b_b']        = $form_b_b;
        $this->data['form_c']          = $form_c;
        $this->data['berkas_fc_pj']    = $berkas_fc_pj;
        $this->data['berkas_skdp']     = $berkas_skdp;
        $this->data['berkas_fapp']     = $berkas_fapp;
        $this->data['berkas_siu']      = $berkas_siu;
        $this->data['berkas_siup']     = $berkas_siup;
        $this->data['berkas_npwp']     = $berkas_npwp;

        $this->template->build('dokumens/detail');      
	}
    public function print_out_fl01($code = null){

    }
    public function uploaded($idx= null){
        try
        {
            $config['upload_path'] = './repository/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|word|wordx|rar';
        
            $this->load->library('upload', $config);

            if ($this->upload->do_upload())
            {
                $up_data = $this->upload->data();
                $post    = array('users_id'=>$this->_uid,'p_form_identity'=>$idx,'flag'=>$this->input->post('flag'),'filename'=>$up_data['file_name']);
                $this->mgeneral->save($post,"p_berkas_upload");
                
                $success = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('upload', 'Upload '.$this->input->post('flag').' Success');
                redirect("registrasi/dokumen/cheklist/".$idx);
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());                
                $this->session->set_flashdata('upload', 'Upload '.$this->input->post('flag').' Error');
                redirect("registrasi/dokumen/cheklist/".$idx);
            }
        }
        catch(Exception $err)
        {
            log_message("error",$err->getMessage());
            return show_error($err->getMessage());
        }
    }
    public function remove_file()
    {
        $delete    = array('id'=>$this->input->post('data_id'));
        $this->mgeneral->delete($delete,"p_berkas_upload");   
        unlink('./repository/'.$this->input->post('name'));
        //$this->session->set_flashdata('upload', 'File '.$this->input->post('flag').' Berhasil Di hapus');
        //redirect("registrasi/dokumen/cheklist/".$idx);
    }
	
   
	
	
	
}


/* End of file role.php */
/* Location: ./application/modules/acl/controllers/role.php */