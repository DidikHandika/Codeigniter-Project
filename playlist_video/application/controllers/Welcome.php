<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_upload_video');
	}

	public function index()
	{
		/*$rowdata=$this->Model_upload_video->view_nm_video();
		$data = array();

		foreach ($rowdata as $row) {
			$data[$row['nama_video']] = $row;
		}
*/
		$this->load->view('welcome_message');
	}
}
