<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	
	public function get_country_list_by_search($keyword='')
	{
		$this->db->like('country_name', $keyword, 'both');
        $sql = $this->db->get('countries');
        return $sql->result_array();
	}

	public function get_country_list($limit='',$offset='')
	{
		$this->db->limit($limit,$offset);
		$sql=$this->db->get('countries');

		return $sql->result_array();
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */
