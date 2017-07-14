<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_ajax_datatable extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_get_data_model');
		$this->load->model('my_datatable_model');
	}

	public function index()
	{
		/*$data['country_list']=$this->my_get_data_model->get_country_list();*/
		$this->load->view('view_ajax_datatable'/*, $data*/);
	}

	public function load_ajax_list()
	{
		$list = $this->my_datatable_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->country_code;
            $row[] = $l->country_name;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->my_datatable_model->count_all(),
                        "recordsFiltered" => $this->my_datatable_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */