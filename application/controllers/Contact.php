<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model','contact_model');
		$this->load->model('Visitor_model','visitor_model');
		$this->load->library('upload');
		$this->load->helper('text');
        $this->visitor_model->count_visitor();
	}
	function index(){
		//$this->output->enable_profiler(TRUE);
		$site_info = $this->db->get('tbl_site', 1)->row();
		$v['logo'] =  $site_info->site_logo_header;
		$data['icon'] = $site_info->site_favicon;
		$data['header'] = $this->load->view('header',$v,TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$data['provinsi'] = $this->db->query('SELECT * FROM provinces')->result_array();
		$this->load->view('contact_view',$data);
	}

	function krisan(){
		//$this->output->enable_profiler(TRUE);
		$site_info = $this->db->get('tbl_site', 1)->row();
		$v['logo'] =  $site_info->site_logo_header;
		$data['icon'] = $site_info->site_favicon;
		$data['header'] = $this->load->view('header',$v,TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$this->load->view('krisan_view',$data);
	}

	function pendukung(){
		//$this->output->enable_profiler(TRUE);
		$site_info = $this->db->get('tbl_site', 1)->row();
		$v['logo'] =  $site_info->site_logo_header;
		$data['icon'] = $site_info->site_favicon;
		$data['header'] = $this->load->view('header',$v,TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$this->load->view('pendukung_view',$data);
	}
	function suara(){
		//$this->output->enable_profiler(TRUE);
		$site_info = $this->db->get('tbl_site', 1)->row();
		$v['logo'] =  $site_info->site_logo_header;
		$data['icon'] = $site_info->site_favicon;
		$data['header'] = $this->load->view('header',$v,TRUE);
		$data['footer'] = $this->load->view('footer','',TRUE);
		$data['provinsi'] = $this->db->query('SELECT * FROM provinces')->result_array();
		$this->load->view('suara_view',$data);
	}

	function send(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// $this->form_validation->set_rules('subject', 'Subject', 'required|min_length[3]|max_length[100]|htmlspecialchars');
		// $this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('nik', 'Nik', 'required');
		$this->form_validation->set_rules('handphone', 'Handphone', 'required|max_length[15]');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('regencies', 'Kota', 'required');
		$this->form_validation->set_rules('districts', 'Kecamatan', 'required');
		$this->form_validation->set_rules('villages', 'Kelurahan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('contact');
		}else{
			$name=$this->input->post('nama',TRUE);
			$email=$this->input->post('email',TRUE);
			$subject=$this->input->post('subject',TRUE);
			$nik=$this->input->post('nik',TRUE);
			$handphone=$this->input->post('handphone',TRUE);
			$provinsi=$this->input->post('provinsi',TRUE);
			$kota=$this->input->post('regencies',TRUE);
			$kecamatan=$this->input->post('districts',TRUE);
			$kelurahan=$this->input->post('villages',TRUE);
			$alamat=$this->input->post('alamat',TRUE);
			$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
			$this->contact_model->save_message($name,$email,$subject,$message,$nik,$handphone, $provinsi, $kota, $kecamatan, $kelurahan, $alamat);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah menjadi relawan kami.</div>');
			redirect('contact');
		}
	}

	function send_suara(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('handphone', 'Handphone', 'required|max_length[15]');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('regencies', 'Kota', 'required');
		$this->form_validation->set_rules('districts', 'Kecamatan', 'required');
		$this->form_validation->set_rules('villages', 'Kelurahan', 'required');
		$this->form_validation->set_rules('desa', 'Desa', 'required');
		$this->form_validation->set_rules('rw', 'Rw', 'required');
		$this->form_validation->set_rules('rt', 'Rt', 'required');
		$this->form_validation->set_rules('tps', 'Tps', 'required');
		$this->form_validation->set_rules('suara', 'Suara', 'required');	
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('contact');
		}else{
			$name=$this->input->post('nama',TRUE);
			$jabatan=$this->input->post('jabatan',TRUE);
			$alamat=$this->input->post('alamat',TRUE);
			$handphone=$this->input->post('handphone',TRUE);
			$provinsi=$this->input->post('provinsi',TRUE);
			$kota=$this->input->post('regencies',TRUE);
			$kecamatan=$this->input->post('districts',TRUE);
			$kelurahan=$this->input->post('villages',TRUE);
			$desa=$this->input->post('desa',TRUE);
			$rw=$this->input->post('rw',TRUE);
			$rt=$this->input->post('rt',TRUE);
			$tps=$this->input->post('tps',TRUE);
			$suara=$this->input->post('suara',TRUE);
			$this->contact_model->save_suara($name,$jabatan,$alamat,$handphone,$provinsi, $kota, $kecamatan, $kelurahan, $desa, $rw, $rt, $tps, $suara);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah menjadi relawan kami.</div>');
			redirect('contact/suara');
		}
	}

	function send_kritik(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('kritik', 'Kritik', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('contact/krisan');
		}else{
			$name=$this->input->post('nama',TRUE);
			$email=$this->input->post('email',TRUE);
			$subject=$this->input->post('kritik',TRUE);
			$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
			$this->contact_model->save_message_kritik($name,$email,$subject);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Kritik dan saran telah kami terima. Terima kasih!</div>');
			redirect('contact/krisan');
		}
	}

	function send_pendukung(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('nik', 'Nik', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('handphone', 'Handphone', 'required|max_length[40]');
		$handphone = $this->input->post('handphone', TRUE);
		$data = $this->db->query("SELECT COUNT(id) as max FROM pendukung WHERE handphone = '".$handphone."' ")->result()[0];
		if ($data->max >= 3) {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Nomor handphone yang anda gunakan sudah di pakai lebih dari 3 kali, Mohon gunakan nomer handphone yang lain, Terima Kasih!</div>');
			redirect('contact/pendukung');
			var_dump('kesini');die;
		}
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('contact/pendukung');
			die;
		}else{
			$name=$this->input->post('nama',TRUE);
			$nik=$this->input->post('nik',TRUE);
			$subject=$this->input->post('alamat',TRUE);
			$handphone = $this->input->post('handphone', TRUE);
			$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
			$this->contact_model->save_message_pendukung($name,$nik,$subject, $handphone);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah menjadi pendukung kami.</div>');
			redirect('contact/pendukung');
		}
	}

	public function kota_show($province_id)
    {
        $data['kota_show'] = $this->db->query('SELECT * FROM regencies WHERE province_id = '.$province_id.'')->result();
        $list = "<option value=''>Pilih Kota</option>";	

        foreach ($data['kota_show'] as $row) {
            $list .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $list;
    }
	
	public function kecamatan_show($regency_id)
    {
        $data['kecamatan_show'] = $this->db->query('SELECT * FROM districts WHERE regency_id = '.$regency_id.'')->result();
        $list = "<option value=''>Pilih Kecamatan</option>";	
        
        foreach ($data['kecamatan_show'] as $row) {
            $list .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $list;
    }

	public function kelurahan_show($districts_id)
    {
        $data['kelurahan_show'] = $this->db->query('SELECT * FROM villages WHERE district_id = '.$districts_id.'')->result();
        $list = "<option value=''>Pilih Kelurahan</option>";	

        foreach ($data['kelurahan_show'] as $row) {
            $list .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $list;
    }
	
	function suara_publish(){

		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['encrypt_name'] = TRUE;
		
	    $test = $this->upload->initialize($config);

	    if(!empty($_FILES['photo']['name'])){
	        if ($this->upload->do_upload('photo')){
	            $img = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/'.$img['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 500;
	            $config['height']= 320;
	            $config['new_image']= './assets/images/'.$img['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $this->_create_thumbs($img['file_name']);

	            $image=$img['file_name'];
				$title	  = strip_tags(htmlspecialchars($this->input->post('title',TRUE),ENT_QUOTES));
				$contents = $this->input->post('contents');
				$category = $this->input->post('category',TRUE);

				$this->load->library('form_validation');


				$this->form_validation->set_rules('nama', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('nik', 'Nik', 'required');
				$this->form_validation->set_rules('handphone', 'Handphone', 'required|max_length[15]');
				$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
				$this->form_validation->set_rules('regencies', 'Kota', 'required');
				$this->form_validation->set_rules('districts', 'Kecamatan', 'required');
				$this->form_validation->set_rules('villages', 'Kelurahan', 'required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'required');
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
					redirect('contact');
				}else{
					$name=$this->input->post('nama',TRUE);
					$email=$this->input->post('email',TRUE);
					$subject=$this->input->post('subject',TRUE);
					$nik=$this->input->post('nik',TRUE);
					$handphone=$this->input->post('handphone',TRUE);
					$provinsi=$this->input->post('provinsi',TRUE);
					$kota=$this->input->post('regencies',TRUE);
					$kecamatan=$this->input->post('districts',TRUE);
					$kelurahan=$this->input->post('villages',TRUE);
					$alamat=$this->input->post('alamat',TRUE);
					$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
					$this->contact_model->save_message($name,$email,$subject,$message,$nik,$handphone, $provinsi, $kota, $kecamatan, $kelurahan, $alamat);
					$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih telah menjadi relawan kami.</div>');
					redirect('contact');
				}

				$description=htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);

				$this->post_model->save_post($title,$contents,$category,$slug,$image,$tags,$description);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/post');
			}else{
				echo $this->session->set_flashdata('msg','warning');
	            redirect('backend/post');
	        }
			
	    }else{
			redirect('backend/post');
		}
	}

	
}