<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_get_data_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_country_list()
	{
		$sql=$this->db->get('countries');
		return $sql->result_array();
	}
	public function get_division_list()
	{
		$sql=$this->db->get('divisions');
		return $sql->result_array();
	}
	public function get_district_list($division_id='',$district_id='')
	{
		if ($district_id) {
			$this->db->where('id', $district_id);
		}
		if ($division_id) {
			$this->db->where('division_id', $division_id);
		}
		$sql=$this->db->get('districts');
		return $sql->result_array();
	}
	public function get_upazila_list($district_id='')
	{
		if ($district_id) {
			$this->db->where('district_id', $district_id);
		}
		$sql=$this->db->get('upazilas');
		return $sql->result_array();
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */