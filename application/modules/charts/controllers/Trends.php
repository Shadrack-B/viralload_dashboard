<?php
defined("BASEPATH") or exit("No direct script access allowed!");

/**
* 
*/
class Trends extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('trends_model');
	}

	function positive_trends($county=NULL){
		$obj = $this->trends_model->yearly_trends($county);
		// echo "<pre>";print_r($obj);echo "</pre>";die();

		$data['trends'] = $obj['suppression_trends'];
		$data['title'] = "Suppression Trends";
		$data['div_name'] = "suppression";
		$data['suffix'] = "%";
		$data['yAxis'] = "Suppression Rate (%)";
		$this->load->view('yearly_trends_view', $data);

		$data['trends'] = $obj['test_trends'];
		$data['title'] = "Test Trends";
		$data['div_name'] = "tests";
		$data['suffix'] = "";
		$data['yAxis'] = "Number of  Valid Tests";
		$this->load->view('yearly_trends_view', $data);

		

		$data['trends'] = $obj['rejected_trends'];
		$data['title'] = "Rejected Trends";
		$data['div_name'] = "rejects";
		$data['suffix'] = "%";
		$data['yAxis'] = "Rejects (%)";
		$this->load->view('yearly_trends_view', $data);


		$data['trends'] = $obj['tat_trends'];
		$data['title'] = "Turnaround Time";
		$data['div_name'] = "tat";
		$data['suffix'] = "";
		$data['yAxis'] = "Tat4 Time";
		$this->load->view('yearly_trends_view', $data);

		

		//echo json_encode($obj);
		//echo "<pr>";print_r($obj);die;

	}

	function summary($county=NULL){
		$data['trends'] = $this->trends_model->yearly_summary($county);
		//$data['trends'] = $this->positivity_model->yearly_summary();
		//echo json_encode($data);
		// echo "<pre>";print_r($data);die();
		$this->load->view('trends_outcomes_view', $data);
	}


}