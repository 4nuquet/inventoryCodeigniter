<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Item_model');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function create()
	{

		if ($this->input->is_ajax_request()) 
		{	
			//obtain Values
			$cod = $this->input->post('cod');
			$name = $this->input->post('name');
			$cate = 1;
			$stock = $this->input->post('stock');
			$pBuy = $this->input->post('pBuy');
			$pSell = $this->input->post('pSell');

			//send to Insert Data
			$res = $this->Item_model->create($cod, $name,$cate, $stock, $pBuy, $pSell);
			if ($res) {
				echo "Succes";
			}else{
				echo "Error";
			} 
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
}
