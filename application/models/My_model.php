<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

	
	public function get_location($keyword='')
	{
		$this->db->like('place_name', $keyword, 'both');
        $query = $this->db->get('tbl_place');
        return $query->result_array();
	}

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */
