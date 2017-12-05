<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function index()
	{
		
       // $this->load->model('model1');
        $this->load->helper('html');
        $this->load->helper('abc');
        a();
         $this->load->model('model1','obj');
        $data['users'] = $this->obj->getData();
        $data['users1'] = $this->obj->getDataBase();
        $data['users2'] = $this->obj->getDataBase_array();
        $this->load->view('hello',$data);
        print_r($data);
        
	}
    public function add()
    {
        $this->load->library('test');
        $this->test->av();
        
        echo "Add function in blog";
    }
}
