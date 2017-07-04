<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_get_data_model');
	}
	public function index()
	{
		$data['country_list']=$this->my_get_data_model->get_country_list();
		$data['division_list']=$this->my_get_data_model->get_division_list();
		$data['district_list']=$this->my_get_data_model->get_district_list();
		$data['upazila_list']=$this->my_get_data_model->get_upazila_list();
		
		$this->load->view('welcome_message',$data);
	}
}
