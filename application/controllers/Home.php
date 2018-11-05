<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Item_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function create()
	{
		if ($this->input->is_ajax_request()) 
		{	
	
			$resImg = $this->uploadImage();
			
			//obtain Values
			if ($resImg !== false) {

				$data = array(
					'item_name' => $this->input->post('name'),
					'item_stock' => $this->input->post('stock'),
					'item_category' => $this->input->post('category'),
					'item_pBuy' => $this->input->post('pBuy'),
					'item_pSell' => $this->input->post('pSell'),
					'item_picture' => $resImg
				);


				$res = $this->Item_model->create($data);
				var_dump($res);
				die();

				if ($res) {
					$alert = array(2, "Articulo Registrado Exitosamente");
				}else{
					 $alert = array(3, "Error al Registrado Articulo");
				}
			}else{
				$alert = $resImg;
			}
			echo json_encode($alert);
			
		}
	}

	public function show(){

		if ($this->input->is_ajax_request()) 
		{
			$word = $this->input->post("word");
			
			$res = $this->Item_model->show();

			if(count($res) > 0 )
			{
				echo json_encode($res);
			}else
			{
				echo "Error";
			}
		}
	}

	public function find(){

			$id = $this->input->post("id");

			$res = $this->Item_model->find($id);

			echo json_encode($res);
	}

	public function edit(){
		
		if ($this->input->is_ajax_request()) 
		{	
			$data = array(
				'item_id' => $this->input->post('id'),
				'item_name' => $this->input->post('name'),
				'item_stock' => $this->input->post('stock'),
				'item_category' => 1,
				'item_pBuy' => $this->input->post('pBuy'),
				'item_pSell' => $this->input->post('pSell')
			);

			//send to Insert Data
			$res = $this->Item_model->edit($data);

			if ($res) 
			{
				 $data =  array('color' => 3, 'msg' => "Se Edito Correctamente");
			}else{
				 $data =  array('color' => 2, 'msg' => "Error al Editar");
			}

			echo json_encode($data);

		}
	}

	public function remove(){
		if ($this->input->is_ajax_request()) 
		{
			$id = $this->input->post("id");

			$res = $this->Item_model->remove($id);

			if ($res) 
			{
				 $data = array(3, 'Se Elimino Correctamente');
			}else{
				 $data = array(2, 'Error al Eliminar');
			}

			echo json_encode($data);
		}
	}

	public function uploadImage(){

		$config['upload_path']          = './uploads/images';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= true;
		
		$this->upload->initialize($config);

		if(isset($_FILES['picture']['name'])){

			if ($this->upload->do_upload('picture')) {

				$data = $this->upload->data();

				$file = $data['file_name'];

				$res = $this->Item_model->uploadImage($file);
				
			}else{
				$res = array('error' => $this->upload->display_errors());
			}

		}else{
			$res = $_FILES['picture']['name']. "Error Image";
		}
		return $res;
	}
}
