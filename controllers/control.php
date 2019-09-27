<?php
  
  class control extends CI_Controller{
      
      
      public function index() {
          $error = 'enter username and password';
          $this->load->model('emodel');
          $this->load->library('form_validation');
          $this->form_validation->set_rules('username','username','required');
          $this->form_validation->set_rules('password','password','required');
          if($this->form_validation->run()== FALSE){
              
              
              $this->load->view('login');
              
          }
          else{
              $username=  $this->input->post('username');
              $password=  $this->input->post('password');
             
              $user= $this->emodel->dologin($username,$password);
             if(!empty($user)){
                 $this->session->set_userdata('user',$user);
                 redirect(base_url().'index.php/control/home');
             }
            else {
                  $this->session->set_flashdata('errormsg','incorrect details');
                  $this->load->view('login');
                }
              
          }
          
              
      }
      function lo(){
          $this->session->unset_userdata('user');
          redirect(base_url());
      }

      public function home() {
          $this->load->model('emodel');
          if(empty($this->session->userdata['user'])){
              redirect(base_url().'index.php/control/lo');
          }
        $users=  $this->emodel->getmails();
        $data=array();
        $data['users']=$users;
        $this->load->view('home',$data);
  
          
      }
      
      public function create(){
        $this->load->model('emodel');
            if(empty($this->session->userdata['user'])){
              redirect(base_url().'index.php/control/lo');
          }
          
          
            $fa= array();
            $fa['email']=  $this->input->post('email');
            $query=$this->emodel->create($fa);
            if(!empty($query)){
                $this->session->set_userdata('msg','successfully added');
            }
            else{
            $this->session->set_userdata('msg','failed to add in database');
                
            }
            $users=  $this->emodel->getmails();
            $data=array();
            $data['users']=$users;
            
            $this->load->view('upload',$data);
            
          
    }
    public function delete($id) {
        $this->load->model('emodel');
    if(empty($this->session->userdata['user'])){
              redirect(base_url().'index.php/control/lo');
          }
     
            $q=$this->emodel->deleteuser($id);
             if(!empty($q)){
                $this->session->set_userdata('msg','successfully deleted');
            }
            else{
            $this->session->set_userdata('msg','failed to delete');
                
            }
            $users=  $this->emodel->getmails();
        $data=array();
        $data['users']=$users;
        
            $this->load->view('upload',$data);
        
        
    }
      
  }


?>

