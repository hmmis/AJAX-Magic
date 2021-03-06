<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_autocomplete extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('my_model');
	}

	public function show()
	{
		$this->load->view('view_auto_complete');
	}

	public function search_result()
	{
		$keyword = $this->input->get('term');
        $result=$this->my_model->get_country_list_by_search($keyword);

        $data_array = array();

        foreach ($result as $r) {
            $row_data = array(
                'label' => $r['country_name'],
                'value' => $r['country_code'],
                );
            array_push($data_array, $row_data);
        }
        echo json_encode($data_array);


	}


}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */
