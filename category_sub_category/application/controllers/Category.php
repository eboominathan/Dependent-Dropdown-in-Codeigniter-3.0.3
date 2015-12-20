<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	Public function get_countries()
	{
		$query=$this->db->get('country');
        $result= $query->result();
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->countryid;
			$data['label']=$r->country;
			$json[]=$data;
			
			
		}
		echo json_encode($json);
		

	
	}

	Public function get_states()
	{

		  $result=$this->db->where('countryid',$_POST['id'])
						->get('state')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->statename;
			$json[]=$data;
			
			
		}
		echo json_encode($json);

	}

		Public function get_cities()
	{

		  $result=$this->db->where('stateid',$_POST['id'])
						->get('city')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id;
			$data['label']=$r->city;
			$json[]=$data;
			
			
		}
		echo json_encode($json);

	}


}
