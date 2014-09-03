<?php
class login extends CI_Controller{

	function index() {
	
		if($this->session->userdata('isLoggedIn')) {
			redirect('home/show_home');
		} else{
			$this->show_login();
		}
	}
	
	function show_login($show_error = false)
                {
		$data['error'] = $show_error;
                $this->load->helper('form');
		$this->load->view('login', $data);
	        }
	
	function login_user()
            {
		$this->load->model('model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');               
	        if($username && $password)
                {
                   $qry=$this->model->validate_user($username, $password);
                   
                   if($qry==1)
                   {
                    redirect('home/show_home');   
                   }                  
                   else if($qry==2)
                   {   $this->load->helper('form');
                      $this->load->view('user_page');
                   }
                   else
                   {
                     $this->session->set_flashdata('message_name', 'Enter a valid username or password!'); 
                redirect('login/show_login','refresh');             
               
                   }
                 
                } 
            }
        
         function sign_out()
           {
          $this->session->sess_destroy();
          $this->index();
         }
                 
         function add_user()
         {       
             $this->load->model('model');
             $usname=$this->input->post('username');
             $pass=$this->input->post('password');
             $cname=$this->input->post('companyname');
            $qr['insert']=$this->model->user_insert($usname,$pass,$cname);
            if($qr['insert'] == FALSE)
            {
             $this->session->set_flashdata('message_name', 'User already exist!'); 
            redirect('home/add_user', 'refresh');
             } 
             else{
                 $this->session->set_flashdata('message_name', 'New user data entered successfully!');              
              redirect('home/show_home', 'refresh');
               }
         }
  }

           
?>
