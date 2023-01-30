<?php

class Contact_model extends CI_Model{
	
	function save_message($name,$email,$subject,$message, $nik, $handphone, $provinsi, $kota, $kecamatan, $kelurahan, $alamat){
		$data = array(
			'inbox_name' => $name,
			'inbox_email' => $email,
			'inbox_subject' => $subject,
			'inbox_message' => $message,
			'nik' => $nik, 
			'phone' => $handphone, 
			'id_provinsi' => $provinsi, 
			'id_kota' => $kota, 
			'id_kecamatan' => $kecamatan, 
			'id_kelurahan' => $kelurahan, 
			'alamat' => $alamat, 
		);
		$this->db->insert('tbl_inbox',$data);
	}

	function save_suara($name,$jabatan,$alamat,$handphone,$provinsi, $kota, $kecamatan, $kelurahan, $desa, $rw, $rt, $tps, $suara){
		$data = array(
			'nama_relawan' => $name,
			'jabatan' => $jabatan,
			'alamat' => $alamat,
			'handphone' => $handphone,
			'provinsi' => $provinsi, 
			'kota' => $kota, 
			'kecamatan' => $kecamatan, 
			'kelurahan' => $kelurahan, 
			'desa' => $desa, 
			'rw' => $rw, 
			'rt' => $rt, 
			'tps' => $tps, 
			'jumlah_suara' => $suara, 
		);
		$this->db->insert('suara',$data);
	}

	function save_message_kritik($name,$email,$subject){
		$data = array(
			'nama' => $name,
			'email' => $email,
			'kritik' => $subject,
		);
		$this->db->insert('kritik',$data);
	}

	function save_message_pendukung($name,$nik,$subject, $handphone){
		$data = array(
			'nama' => $name,
			'nik' => $nik,
			'alamat' => $subject,
			'handphone' => $handphone,
		);
		$this->db->insert('pendukung',$data);
	}
}