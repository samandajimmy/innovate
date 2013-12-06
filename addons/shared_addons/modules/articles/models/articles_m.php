<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles_m extends MY_Model {
	
	protected $_table = 'default_inn_articles';
	
	public $rules = array(
			'title' => array(
					'field' => 'title',
					'label' => 'Title',
					'rules' => 'trim|xss_clean|required|max_length[100]'
			),
			'intro' => array(
					'field' => 'intro',
					'label' => 'Intro',
					'rules' => 'trim|xss_clean|required|max_length[200]'
			),
			'body' => array(
					'field' => 'body',
					'label' => 'Body',
					'rules' => 'trim|xss_clean|required'
			),
			'keywords' => array(
					'field' => 'keywords',
					'label' => 'Tags',
					'rules' => 'trim|xss_clean|max_length[20]'
			),
	);
	
	
	
	
//=================== General Function ====================//
	
	public function __construct()
	{		
		parent::__construct();
	}
	
	
	public function add_new(){
		$data = new stdClass();
		
		$data->title = '';
		$data->body = '';
		$data->created_on = '';
		$data->modified_on = '';
		
		return $data;
	}
	
	
	public function get_articles($fields = NULL, $single = FALSE){
		
		if(isset($fields)){
			$this->db->select($fields);
		}
		
		$method = 'result';
		if($single){
			$method = 'row';
		}else{
			$method = 'result';
		}
		
		return $this->db->get($this->_table)->$method();
	}
	
	public function get_articles_by($where = NULL, $fields, $single){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->get_articles($fields, $single);
	}
}