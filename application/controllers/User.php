<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
		$this->load->library('upload');
    }

    function create(){

        if ($this->input->is_ajax_request()) 
		{	

			$resImg= $this->uploadImage();

			if($resImg['error'] !== ""){

				
				$resImg = 'assets/img/default-avatar.png';

			}

			if ($resImg !== false) {

				//obtain Values
				$nameuser = $this->input->post('nameuser');
				$identificacionuser = $this->input->post('identificacionuser');
				$passuser = md5($this->input->post('passuser'));
				$roluser = $this->input->post('roluser');
				
			
				//send to Insert Data
				$res = $this->User_model->create($nameuser,$identificacionuser,$passuser,$roluser,$resImg);
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


	
    function show(){

		$mount=10;

		$word = $this->input->post("word");
		$no_pag = $this->input->post('no_pag');
		
		$init = ($no_pag - 1) * $mount;

		if($this->input->is_ajax_request()){

			$res = array(
				'data' => $this->User_model->show($word, $init, $mount),
				'total' => count($this->User_model->show($word)),
				'mount' => $mount
				);

			echo json_encode($res);	
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

			$resImg = $this->uploadImage();
			$id = $this->input->post('id-user-edit');

			

			if($resImg['error'] !== ""){

				$val = $this->User_model->find($id);
				$resImg = $val[0]->pic_id;

			}

			if ($resImg !== false) {
            
            //obtain Values
            
            $name = $this->input->post('nameuser');
            //$pass
			$nid = $this->input->post('identificacionuser');
            $role = $this->input->post('roluser');
            $state = $this->input->post('stateUser');

            //var_dump($_POST);
            //die();
            
            //send to Insert Data
			$res = $this->User_model->edit($id, $name, $nid, $role, $state,$resImg);
            
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

	public function uploadImage(){

		$config['upload_path']          = './uploads/images';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 70000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= true;
		
		$this->upload->initialize($config);

		if(isset($_FILES['picture']['name'])){

			if ($this->upload->do_upload('picture')) {

				$data = $this->upload->data();

				$file = $data['file_name'];

				$res = $this->User_model->uploadImage($file);
				
			}else{
				$res = array('error' => $this->upload->display_errors());
			}

		}else{
			$res = $_FILES['picture']['name']. "Error Image";
		}
		return $res;
	}

}