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
		$this->load->view('view_ajax_datatable');
	}

	public function load_ajax_list()
	{
		
        //******************
        $offset=$this->input->post('start');
        $limit=$this->input->post('length');
        //******************

        $list = $this->my_datatable_model->get_datatables($limit,$offset);
        $data = array();

        foreach ($list as $l) {
			$offset++;
			$row    = array();
			/*Table Column*/
			$row[]  = $offset;
			$row[]  = $l['country_code'];
			$row[]  = $l['country_name'];
			$row[]  = "<a href='".base_url()."delete_it/".$l['id']."'>Delete</>";
			/* End a Table Row */
			$data[] = $row;
        }
 
        $output = array(
					"draw"            => $_POST['draw'],	//lengthPage
					"recordsTotal"    => $this->my_datatable_model->count_all(),			//total Recordes
					"recordsFiltered" => $this->my_datatable_model->count_filtered(),	//total Recordes with search and order //prginatiom Depands
					"data"            => $data,
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