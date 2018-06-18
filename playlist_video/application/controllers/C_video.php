<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_video extends CI_Controller {
	public function __construct(){
			parent::__construct();
			$this->load->model('Model_upload_video');
		}
	public function index()
	{
		$data['v_video'] = $this->Model_upload_video->view_video();
		$data['ar_video'] = $this->Model_upload_video->view_nm_video();

		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/body',$data);
		$this->load->view('admin/footer');
	}

	function data_barang(){
        $data=$this->Model_upload_video->view_nm_video();
        
        echo json_encode(array("result" => $data));
    }

	public function add_video(){
		if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
			unset($config);
			$date = date("ymd");
			$configVideo['upload_path'] = './assets/video';
			$configVideo['max_size'] = '100000';
			$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = FALSE;
			$video_name = $_FILES['video']['name'];
			$configVideo['file_name'] = $video_name;

			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
			if(!$this->upload->do_upload('video')) {
				echo $this->upload->display_errors();
			}else{
				$data=array(
					'nama_video'=> $configVideo['file_name'],
					'tgl_upload'=> date("Y:m:d H:m:s"),
					'tampil' 	=> 0
				);

				$this->Model_upload_video->insert_video($data);

				$msg='<div class="alert alert-success">
					<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
			
				$this->index($msg);
				$this->session->set_flashdata('message', $msg);
				redirect('C_video');
			}

		}else{
			echo "Please select a file";
		}
	}

	public function edit_video($id_v)
	{
		$status = $this->Model_upload_video->view_status_by_id($id_v);
		if ($status->tampil == "1") {
			$data['update_video'] = $this->Model_upload_video->update_status_by_id($id_v,"0");
			redirect('C_video');
		}else{
			$data['update_video'] = $this->Model_upload_video->update_status_by_id($id_v,"1");
			redirect('C_video');
		}
	}

	public function delete_video($id)
	{
		$video = $this->Model_upload_video->view_status_by_id($id);
		$this->Model_upload_video->delete($id, $video->nama_video);
		redirect('C_video');
	}

}
