<?php

class model extends CI_Model {

	var $details;
        
 function validate_user($username, $password)
            {
     //validating user and redirect to home page
            $this->db->from('login');
            $this->db->where('username', $username);
            $this->db->where('password',crypt(($password), 'rl'));
            $login = $this->db->get()->result();
            if(is_array($login) && count($login) == 1)
                    {                          
                        $this->details = $login[0];
                        if($login[0]->user_role == 1)
                        {                       
                        $this->set_session();
                        return 1;
                        }
                        else if($login[0]->user_role==2)
                        {
                        $this->set_session();
                        return 2;
                        }
                    }
                    else
                     {
                     return FALSE;
                     }
                }
            
 
	function set_session() {
		$this->session->set_userdata( array(
			'id' => $this->details->id,
		        'username' => $this->details->username,
                        'company_name' =>$this->details->company_name,
			'isLoggedIn' => true
			)
		);
	}
        function company_insert($cname)
        {
            //for adding new company
        $this->db->from('company');
        $this->db->select('*');
        $this->db->where('company_name',$cname);
         $log= $this->db->get()->result();
       if(count($log)==1)
       {
        return false;
       }
       else 
       {
            $qry="insert into company(company_name)values('$cname')";
            mysql_query($qry);
            return true;
         }
         }
    
      function user_insert($usname,$pass,$cname)
        {
        //function for inserting users
         $this->db->from('login');
        $this->db->select('*');
        $this->db->where('username',$usname);
         $log= $this->db->get()->result();
       if(count($log)==1)
       {
        return false;
       }
       else 
       {
        $pas=crypt($pass,"rl"); 
        $qr="insert into login(username,password,company_name,user_role)values('$usname','$pas','$cname',2)";
        $qry=$this->db->query($qr);
        return true;
        }
       }
     
       function getAllGroups()
         {//function for display companies.
         $query = $this->db->query('SELECT company_name FROM company');
         return $query->result();
         }
      
}


?>