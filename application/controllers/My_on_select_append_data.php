<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_on_select_append_data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_get_data_model');
	}
	public function index()
	{
		
		$data['district_list']=$this->my_get_data_model->get_district_list();

		$this->load->view('view_on_select_append_data', $data);
	}

	public function get_upzilla_list()
	{
		$id=$this->input->get('selected_id');

		$result=$this->my_get_data_model->get_upazila_list($id);
		
		echo json_encode($result);
		//echo "100";
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */