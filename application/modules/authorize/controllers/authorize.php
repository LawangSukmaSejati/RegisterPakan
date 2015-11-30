<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Authorize extends MY_Controller 
{
	function __construct()
    {
        parent::__construct();
        //$this->load->model('mgeneral');
        //$this->load->helper('rand_string');
        $this->ci =& get_instance();
        $this->ci->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
        
    }
    function index()
	{        
		// user is already logged in
        if ($this->auth->loggedin()) 
		{
            redirect($this->config->item('dashboard_uri'));
        }
		
		$this->load->language('auth');
		$type = base64_decode($this->input->post('type'));
        
        switch ($type) {
            case 'login':
                // form submitted
                if ($this->input->post('username') and $this->input->post('password')) 
                {
                    $remember = $this->input->post('remember') ? TRUE : FALSE;
                    
                    // get user from database
                    $user = $this->user_model->get_by_username($this->input->post('username'));
                    if ($user && $this->user_model->check_password($this->input->post('password'), $user->password))
                    {
                        if($user->status == 1){
                        // mark user as logged in
                        $this->auth->login($user->id, $remember);
                        
                        // Add session data
                        $this->session->set_userdata(array(
                            'lang'      => $user->lang,
                            'role_id'   => $user->role_id,
                            'role_name' => $user->role_name
                        ));
                        
                        redirect($this->config->item('dashboard_uri'));
                        }else{
                            $this->template->add_message('danger', "Akun Anda belum aktif");    
                        }
                    }
                    else{
                        $this->template->add_message('danger', lang('login_attempt_failed'));
                    }
					$this->template->add_message('danger', lang('login_attempt_failed'));
                }
				
                
                if ($this->input->post('username'))
                    $this->data['username'] = $this->input->post('username');
                if ($this->input->post('remember'))
                    $this->data['remember'] = $this->input->post('remember');

                break;
            case 'register':

                break;
            case 'forgot':
                break;
            default:
                
                break;
        }
        //$this->template->add_message ('danger', lang('login_attempt_failed'));
        
        // show login form
        $this->load->helper('form');
		$this->template->set_layout('login')
        ->build('vauth');
	}
    function login_is_ajax(){
        // user is already logged in
        if(!$this->input->is_ajax_request()) show_404('pages' ,900 );
        $result =  array();
        if ($this->auth->loggedin()) 
        {
            redirect($this->config->item('dashboard_uri'));
        }
        
        $this->load->language('auth');
        // form submitted
        if ($this->input->post('username') && $this->input->post('password')) 
        {
            $remember = $this->input->post('remember') ? TRUE : FALSE;
            
            // get user from database
            $user = $this->user_model->get_by_username($this->input->post('username'));
            if ($user && $this->user_model->check_password($this->input->post('password'), $user->password))
            {
                if($user->status == 1){
                    // mark user as logged in
                    $this->auth->login($user->id, $remember);
                    
                    // Add session data
                    $this->session->set_userdata(array(
                        'lang'      => $user->lang,
                        'role_id'   => $user->role_id,
                        'role_name' => $user->role_name
                    ));
                    $result['rescode'] = 0;
                    $result['message'] = "Login Success";
                    //redirect($this->config->item('dashboard_uri'));
                }else{
                    $result['rescode'] = 2;
                    $result['message'] = "Akun Anda Belum aktif";
                }
               
            }
            else{
                //$this->template->add_message ('danger', lang('login_attempt_failed'));
                $result['rescode'] = 1;
                $result['message'] = "Username and Password Not Match";
            }
        }
        
        if ($this->input->post('username'))
            $this->data['username'] = $this->input->post('username');
        if ($this->input->post('remember'))
            $this->data['remember'] = $this->input->post('remember');
        echo json_encode($result);
    }
    public function register_ajax(){
        if(!$this->input->is_ajax_request()) show_404('pages' ,900 );
        $result =  array();
        
        if ($this->auth->loggedin()) 
        {
            redirect($this->config->item('dashboard_uri'));
        }
        /* Inisiet*/
        $date       = date('Y-m-d');
        $fullname      = $this->input->post('reg_fullname');
        $username      = $this->input->post('reg_username');
        $email         = $this->input->post('reg_email');
        $password      = $this->input->post('reg_password');                      
        $HashPassword  = $this->ci->passwordhash->HashPassword($password);
        $registered    = $date;
        $role          = 5;
        $status        = 0;
        $data =  array(
            'first_name'=>$fullname,
            'username'=>$username,
            'email'=>$email,
            'password'=>$HashPassword,
            'registered'=>$registered,
            'role_id'=>$role,
            'status'=>$status,
        );
        if($post = $this->mgeneral->save($data,'auth_users')){

            $result['code'] = 0;
            $result['info'] = "Registrasi Berhasil";
        }
        echo json_encode($result);
            
    }
}

/* End of file login.php */
/* Location: ./application/modules/auth/controllers/login.php */