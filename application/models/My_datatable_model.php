<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_datatable_model extends CI_Model {

	var $table = 'countries';
    var $column_order = array(null, 'country_code','country_name'); //set column field database for datatable orderable
    var $column_search = array('country_code','country_name'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }

    private function get_datatables_for_search_and_order()
    {
    	
    	$loop = 0;
    	
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
            	
                if($loop===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                	$this->db->or_like($item, $_POST['search']['value']);
                }
                
                if(count($this->column_search) - 1 == $loop) //last loop
                    $this->db->group_end(); //close bracket
                }
                $loop++;
            }
            
        if(isset($_POST['order'])) // here order processing
        {
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    function get_datatables($limit='',$offset='')
    {
    	$this->get_datatables_for_search_and_order();
    	if($limit != -1){
    		$this->db->limit($limit, $offset);
    	}
    	$query = $this->db->get($this->table);
    	return $query->result_array();
    }
    
    function count_filtered()
    {
    	$this->get_datatables_for_search_and_order();
    	$query = $this->db->get($this->table);
    	return $query->num_rows();
    }
    
    public function count_all()
    {
    	
    	$this->db->from($this->table);
    	return $this->db->count_all_results();
    }

}

/********************End of file********************/
/**
 * The File is created by
 * @ H M Mohidul Islam (Shovon)
 */