<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
        $this->load->library('grocery_CRUD');
	}
	public function index() {
		$data['gcrud']=1;
		$this->load->view('new/admin',$data);
	}
	public function tentangkami() {
		$data['gcrud']=1;
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('haldep');
			$crud->set_subject('Tentang Kami');
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();

			$data['output']=(object)$output;
			$this->load->view('new/admin',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function aktor() {
		$data['gcrud']=1;
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('aktor');
			$crud->set_subject('Actor');
			$crud->set_field_upload('foto','assets/uploads/files');
			$output = $crud->render();

			$data['output']=(object)$output;
			$this->load->view('new/admin',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function visimisi() {
		$data['gcrud']=1;
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('carousel');
			$crud->set_subject('Actor');
			$crud->set_field_upload('foto','assets/uploads/files');
			$output = $crud->render();
			
			$data['output']=(object)$output;
			$this->load->view('new/admin',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	
}
