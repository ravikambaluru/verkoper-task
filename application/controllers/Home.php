<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model", "home");
	}
	public function index()
	{
		$data = $this->home->get_initial_data();
		$range_set = array("25", "25-50", "50-75", "75");
		$meta_data = $this->get_meta_data($data, $range_set);
		$data['meta'] = $meta_data;
		$this->load->view('home', $data);
	}

	public function get_meta_data($data, $range_set)
	{

		$finalArray = array();
		for ($i = 0; $i < count($range_set); $i++) {
			$index = $i;
			$set = $range_set[$i];
			if (strpos($set, '-')) {
				$exploded = explode("-", $set);
				$count = 0;
				$male = 0;
				$female = 0;
				foreach ($data as $key => $value) {
					if ($data[$key]['avg'] < $exploded[1] && $data[$key]['avg'] > $exploded[0]) {
						$count++;
						if ($data[$key]['gender'] == "male") {
							$male++;
						}
						if ($data[$key]['gender'] == "female") {
							$female++;
						}
					}
				}

				$finalArray[$set] = array("count" => $count, "male" => $male, "female" => $female);
			} else {
				$count = 0;
				$male = 0;
				$female = 0;
				if ($index !== 3) {
					foreach ($data as $key => $value) {
						if ($data[$key]['avg'] <= $set) {
							$count++;
							if ($data[$key]['gender'] == "male") {
								$male++;
							}
							if ($data[$key]['gender'] == "female") {
								$female++;
							}
						}
					}

					$finalArray[$set] = array("count" => $count, "male" => $male, "female" => $female);
				}
				if ($index == 3) {
					
					foreach ($data as $key => $value) {
						if ($data[$key]['avg'] >= $set) {
							$count++;
							if ($data[$key]['gender'] == "male") {
								$male++;
							}
							if ($data[$key]['gender'] == "female") {
								$female++;
							}
						}
					}

					$finalArray[$set] = array("count" => $count, "male" => $male, "female" => $female);
				}
			}
		}

		return $finalArray;
	}

	public function dynamic_data()
	{
		$data = $this->home->get_initial_data();
		$range_set = $this->input->post();
		$meta_data = $this->get_meta_data($data, $range_set);
		$json=json_encode($meta_data);
		echo $json;
	}
}
