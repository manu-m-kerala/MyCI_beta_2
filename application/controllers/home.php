<?php

class home extends CI_Controller{

	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('isLoggedIn')) {
			redirect ('/login/show_login');
		}
	}
     	
	function show_home()
        {
	$this->load->view('home');
	}
         function add_user()
         {
        $this->load->model('model');
        $data['groups'] =$this->model->getAllGroups();
        $this->load->helper('form');
        $this->load->view('add_user',$data);   
        }
        function  add_company()
         {
         $this->load->helper('form');
         $this->load->view('add_company');   
         }
        function company_insert()
        {   
            $cname=$this->input->post('company-name');
            $this->load->model('model');
            $data['insert_company']=$this->model->company_insert($cname);
            if($data['insert_company'] == false)
            {           
                $this->session->set_flashdata("alert_error", "The organization already exist");
               redirect('home/add_company', 'refresh');
            } 
            else
            {
                 $this->session->set_flashdata("alert_error", "You Have Successfully added organization");           
            redirect('home/show_home', 'refresh');
            }
        }
       
        
    
}

