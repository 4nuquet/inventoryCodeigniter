<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
    }

    function create(){

        if ($this->input->is_ajax_request()) 
		{	
			//obtain Values
			$nameuser = $this->input->post('nameuser');
			$identificacionuser = $this->input->post('identificacionuser');
            $passuser = md5($this->input->post('passuser'));
            $roluser = $this->input->post('roluser');
            
           
			//send to Insert Data
			$res = $this->User_model->create($nameuser,$identificacionuser,$passuser,$roluser);
			if ($res) {
				echo "Succes";
			}else{
				echo "Error";
            } 
            
		}
    }

    function show(){
        
        if($this->input->is_ajax_request()){
            $data=$this->User_model->show();
            echo json_encode($data) ;
        }
     
    }

    public function find(){

        $id = $this->input->post("id");

        $res = $this->User_model->find($id);

        echo json_encode($res);
    }

    public function remove(){
        if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post("id");

			$res = $this->User_model->remove($id);

			if ($res) 
			{
				 $data =  array('color' => 3, 'msg' => "Se Elimino Correctamente");
			}else{
				 $data =  array('color' => 2, 'msg' => "Error al Eliminar");
			}

			echo json_encode($data);
		}
    }

    public function edit(){
		
		if ($this->input->is_ajax_request()) 
		{	

            
            //obtain Values
            $id = $this->input->post('id-user-edit');
            $name = $this->input->post('nameuser');
            //$pass
			$nid = $this->input->post('identificacionuser');
            $role = $this->input->post('roluser');
            $state = $this->input->post('stateUser');

            //var_dump($_POST);
            //die();
            
            //send to Insert Data
			$res = $this->User_model->edit($id, $name, $nid, $role, $state);
            
			if ($res) 
			{
				 $data =  array('color' => 3, 'msg' => "Se Edito Correctamente");
			}else{
				 $data =  array('color' => 2, 'msg' => "Error al Editar");
			}

			echo json_encode($data);

		}
	}

}