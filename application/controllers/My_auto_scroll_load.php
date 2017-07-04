<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_auto_scroll_load extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model');
	}
	public function scroll_pagination()
	{
		$page=$this->input->get("page");
		$limit=10;

		if($page){
			$offset = (($page-1)* $limit);
			$data['country_list'] = $this->my_model->get_country_list($limit,$offset);
			if ($data['country_list']) {
				$result = $this->load->view('view_auto_scroll_loaded_div', $data);
				echo json_encode($result);
			}
		}else{
			$offset = 0;
			$data['country_list'] =$this->my_model->get_country_list($limit,$offset);
			$this->load->view('view_auto_scroll_load', $data);
		}

		
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */
